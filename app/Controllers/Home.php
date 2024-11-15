<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_galeri;
class Home extends BaseController
{
public function dashboard()
{
    if (session()->get('id_level') > 0) {
        $model = new M_galeri;

        $this->log_activity('User Membuka Dashboard');
        
        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

        // Ambil semua album
        $data['erwin'] = $model->tampil('tb_album');

        // Ambil foto untuk setiap album berdasarkan id_album
        foreach ($data['erwin'] as $key => $album) {
            $data['erwin'][$key]->foto = $model->getWhere2('tb_foto', ['id_album' => $album->id_album]);
        }

        $data['album'] = $model->tampil('tb_album');

        echo view('header');
        echo view('menu', $data);
        echo view('dashboard', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function get_foto_by_album()
{
    $id_album = $this->request->getPost('id_album');
    $model = new M_galeri();
    
    // Ambil foto-foto berdasarkan id_album
    $photos = $model->getWhere2('tb_foto', ['id_album' => $id_album]);

    // Return foto dalam format JSON
    return $this->response->setJSON($photos);
}

public function foto_album($id){
    $model = new M_galeri();
    
    $where = array('id_user' => session()->get('id_user'));
    $data['user'] = $model->getWhere('tb_user', $where);

    $this->log_activity('User Membuka Album');

    // Ambil foto-foto berdasarkan id_album
    $data['photos'] = $model->getWhere2('tb_foto', ['id_album' => $id]);

    $data['komen'] = $model->tampilwhere('tb_komentar_foto', ['id_foto' => $id]);
        
    echo view('header');
        echo view('menu', $data);
        echo view('foto_dalam_album', $data);
        echo view('footer');

}

public function data_komentar($id) {
    $model = new M_galeri();

    $this->log_activity('User Membuka Komentar');

    // Fetch comments with usernames
    $data['komen'] = $model->db->table('tb_komentar_foto')
        ->select('tb_komentar_foto.*, tb_user.username')
        ->join('tb_user', 'tb_komentar_foto.id_user = tb_user.id_user')
        ->where('tb_komentar_foto.id_foto', $id)
        ->get()
        ->getResult();
    
    return $this->response->setJSON($data['komen']); // Return JSON response
}

public function add_comment()
{
    $model = new M_galeri();  // Assuming M_galeri is your model class for handling gallery-related data

    $this->log_activity('User Melakukan Komentar');
    
    $id_foto = $this->request->getPost('id_foto');
    $isi_komentar = $this->request->getPost('isi_komentar');
    
    // Assuming `username` is stored in the session when the user logs in
    $username = session()->get('id_user'); 

    // Prepare data to be inserted
    $data = [
        'id_foto' => $id_foto,
        'id_user' => $username,
        'isi_komentar' => $isi_komentar,
        'tanggal_komentar' => date('Y-m-d')
    ];

    if ($model->tambah('tb_komentar_foto', $data)) {
        return $this->response->setJSON(['status' => 'success', 'message' => 'Komentar berhasil ditambahkan']);
    } else {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan komentar']);
    }
}

	public function login()
	{
		$model=new M_galeri;
		

		$this->log_activity('User ke Halaman Login');

		echo view('header');
		echo view('login');
	}

	public function aksilogin()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');
        $captchaAnswer = $this->request->getPost('captcha_answer');

		$this->log_activity('User melakukan Login');

        $model = new M_galeri();
        $where = array(
            'username' => $u,
            'password' => md5($p)
        );

        $cek = $model->getWhere('tb_user', $where);

        // Offline CAPTCHA answer (should match the one generated in the view)
        if (!$this->isOnline() && !empty($captchaAnswer)) {
            $correctAnswer = $this->request->getPost('correct_captcha_answer');
            if ($captchaAnswer != $correctAnswer) {
                return redirect()->to('Home/login')->with('error', 'Incorrect offline CAPTCHA.');
            }
        }

        if ($cek > 0) {
            // Handle sessions as usual
            session()->set('id_user', $cek->id_user);
            session()->set('id_level', $cek->id_level);
            session()->set('email', $cek->email);
            session()->set('username', $cek->username);

            // Redirect to the dashboard
            return redirect()->to('Home/dashboard');
        } else {
            return redirect()->to('Home/login');
        }
    }

    // Function to check if the client is online
    private function isOnline()
    {
        // A simple method to check if the client is online (can be more sophisticated)
        return @fopen("http://www.google.com:80/", "r");
    }


	public function logout()
	{
		$this->log_activity('User Melakukan Log Out');
		session()->destroy();
		return redirect()->to('Home/login');
	}

	public function signup()
	{

        $this->log_activity('User Membuka Sign Up');

		echo view('header');
		echo view('signup');
	}

	public function aksi_signup()
{
    $model = new M_galeri();

    // Log activity for signup
    $this->log_activity('User melakukan Sign Up');

    // Retrieve form data
    $username = $this->request->getPost('username');
    $nama_lengkap = $this->request->getPost('nama_lengkap');
    $password = $this->request->getPost('password');
    $email = $this->request->getPost('email');
    $alamat = $this->request->getPost('alamat');

    // Prepare data to insert
    $data = array(
        'username' => $username,
        'nama_lengkap' => $nama_lengkap,
        'password' => md5($password),  // Hash the password before storing
        'email' => $email,
        'alamat' => $alamat,
        'id_level' => '1'
    );

    // Insert data into 'tb_user' table
    $model->tambah('tb_user', $data);
    
    // Redirect with success message
    return redirect()->to('Home/login')->with('success', 'Sign Up berhasil.');
}

	private function log_activity($activity)
{
	$model = new M_galeri();
	$data = [
		'id_user'    => session()->get('id_user'),
		'activity'   => $activity,
		'timestamp' => date('Y-m-d H:i:s'),
		'delete_at' => '0'
	];

	$model->tambah('tb_activity', $data);
}

public function activity()
{
	if (session()->get('id_level')>0) {
		$model = new M_galeri();
		
		$where = array('id_user'=>session()->get('id_user'));
		$data['user'] = $model->getWhere('tb_user', $where);
		
		// $where = array('id_setting' => 1);
		// $data['setting'] = $model->getWhere('tb_setting',$where);
		
		$this->log_activity('User membuka Log Activity');
		
		$data['erwin'] = $model->join('tb_activity', 'tb_user',
		'tb_activity.id_user = tb_user.id_user',$where);

	echo view('header' ,$data);
	echo view('menu',$data);
	echo view('activity',$data);
	echo view('footer');

	}else{
		return redirect()->to('home/login');
	}
	}

	public function hapus_activity($id){

        $model = new M_galeri();

        $this->log_activity('User Melakukan Hapus Activity');
    
        $where = array('id_activity'=>$id);
        $model->hapus('tb_activity',$where);
        
        return redirect()->to('Home/activity');
    }

	public function album()
	{
        if (session()->get('id_level') > 0) {
        $model=new M_galeri;

        $this->log_activity('User Membuka Menu Album');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

        // $where = array('id_setting' => 1);
		// $data['setting'] = $model->getWhere('tb_setting',$where);

        $where = array('tb_album.delete_at' => NULL);
        // $data['erwin'] = $model->joinuser('tb_user',
		// 'tb_kelas',
		// 'tb_user.id_kelas = tb_kelas.id_kelas', $where);

        //$data['erwin'] = $model->tampil('tb_user');
        $data['erwin'] = $model->getWhere2('tb_album', $where);

		echo view('header', $data);
        echo view('menu', $data);
        echo view('album', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}

    public function aksi_t_album()
{
    $model = new M_galeri();

    // Log activity for signup
    $this->log_activity('User melakukan Tambah Album');

    // Retrieve form data
    $nama_album = $this->request->getPost('nama_album');
    $deskripsi = $this->request->getPost('deskripsi');
    $tanggal_dibuat = $this->request->getPost('tanggal_dibuat');
    $id_session_user = session()->get('id_user');

    // Prepare data to insert
    $data = array(
        'nama_album' => $nama_album,
        'deskripsi' => $deskripsi,
        'tanggal_dibuat' => $tanggal_dibuat,  // Hash the password before storing
        'id_user' => $id_session_user,
        'create_at' => date('Y-m-d H:i:s'),
        'create_by' => $id_session_user,
    );

    // Insert data into 'tb_user' table
    $model->tambah('tb_album', $data);
    
    // Redirect with success message
    return redirect()->to('Home/album')->with('success', 'Tambah Album berhasil.');
}

public function aksi_e_album()
{
    $model = new M_galeri();

    $this->log_activity('User Melakukan Edit Album');

    $id_album = $this->request->getPost('id_album');
    $nama_album = $this->request->getPost('nama_album');
    $deskripsi = $this->request->getPost('deskripsi');
    $tanggal_dibuat = $this->request->getPost('tanggal_dibuat');
    $id_session_user = session()->get('id_user');
    $where = ['id_album' => $id_album];

    // Fetch old data from tb_user
    $oldData = $model->getWhere('tb_album', $where);

    // Backup old data if it exists
    if ($oldData) {
        $backupData = [
            'id_album' => $oldData->id_album,
            'nama_album' => $oldData->nama_album,
            'deskripsi' => $oldData->deskripsi,
            'tanggal_dibuat' => $oldData->tanggal_dibuat,
            'id_user' => $oldData->id_user,
            'update_by' => $oldData->update_by,
            // 'password' => $oldData->password,
            'update_at' => $oldData->update_at,
            'backup_at' => date('Y-m-d H:i:s'), // current time
            'backup_by' => $id_session_user
        ];

        // Save old data to a backup table
        if ($model->saveToBackup('tb_album_backup', $backupData)) {
            echo "Data backup berhasil disimpan!";
        } else {
            echo "Gagal menyimpan data ke backup.";
        }
    } else {
        echo "Data lama tidak ditemukan.";
    }

    // Prepare updated data
    $newData = [
        'nama_album' => $nama_album,
        'deskripsi' => $deskripsi,
        'tanggal_dibuat' => $tanggal_dibuat,
        'id_user' => $id_session_user,
    ];

    // Update tb_user with new data
    $model->edit('tb_album', $newData, $where);
    // print_r($backupData);
    return redirect()->to('Home/album')->with('success', 'Data Album berhasil diperbarui.');
}

public function restore_edit_album()
{
    if (session()->get('id_level') > 0) {
    $model = new M_galeri;

    $this->log_activity('User Membuka Menu Restore Edit Album');

    $where = array('id_user' => session()->get('id_user'));
    $data['user'] = $model->getWhere('tb_user', $where);

    // $where = array('id_setting' => 1);
    // $data['setting'] = $model->getWhere('tb_setting',$where);

    $where = array('tb_album_backup.delete_at' => NULL);
    $data['erwin'] = $model->tampilwhere('tb_album_backup', $where);

    echo view ('header', $data);
    echo view ('menu', $data);
    echo view ('restore_edit_album',$data);
    echo view ('footer');

} else {
    return redirect()->to('home/login');
}
}

public function restore_data_edit_album($backup_id)
{
$model = new M_galeri();

// Fetch the backup data by the kelas ID
$backupData = $model->db->table('tb_album_backup')->where('id_album', $backup_id)->get()->getRow();

if ($backupData) {
    // Prepare the data to restore into tb_kelas
    $data = [
        'nama_album' => $backupData->nama_album,
        'deskripsi' => $backupData->deskripsi,
        'tanggal_dibuat' => $backupData->tanggal_dibuat,
        'id_user' => $backupData->id_user,
        'update_by' => $backupData->backup_by,
        'update_at' => $backupData->backup_at,
    ];

    // Update the tb_kelas table with the backup data
    $model->db->table('tb_album')->where('id_album', $backup_id)->update($data);

    // Delete the backup data after restoration
    $model->db->table('tb_album_backup')->where('id_album', $backup_id)->delete();

    // Log the restore activity
    $this->log_activity('User Restore Data Album');

    return redirect()->to('Home/album')->with('success', 'Data Album berhasil dipulihkan dari backup.');
}

return redirect()->to('Home/album')->with('error', 'Gagal memulihkan data.');
}

public function restore_hapus_album()
	{
        if (session()->get('id_level') > 0) {
		$model = new M_galeri;

        $this->log_activity('User Membuka Menu Restore Hapus Album');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

        $where = 'tb_album.delete_at is not NULL';
		$data['erwin'] = $model->tampilwhere('tb_album', $where);

		echo view ('header', $data);
		echo view ('menu', $data);
		echo view ('restore_hapus_album',$data);
		echo view ('footer');

    } else {
        return redirect()->to('home/login');
    }
		
	}

    public function hapus_album($id)
    {
		$model = new M_galeri();

		$this->log_activity('User melakukan Hapus Album');

        $id_user = session()->get('id_user');

		$where = array('id_album'=>$id);
        $isi = array(

            'delete_at' => date('Y-m-d H:i:s'),
            'delete_by' => $id_user
);
		$model->edit('tb_album',$isi,$where);
		
		return redirect()->to('Home/album');
	}

    public function hapus_restore_album($id)
    {
		$model = new M_galeri();

		$this->log_activity('User melakukan Restore Album');

		$where = array('id_album'=>$id);
        $isi = array(

            'delete_at' => NULL,
            'delete_by' => NULL,
);
		$model->edit('tb_album', $isi,$where);
		
		return redirect()->to('Home/album');
	}

    public function hapus_album_permanen($id)
    {
        $model = new M_galeri();

        $this->log_activity('User melakukan Penghapusan Data Album Permanen');

        $where = array('id_album'=>$id);
        $model->hapus('tb_album',$where);
        
        return redirect()->to('Home/album');
    }

    public function toggle_like()
{

    $this->log_activity('User Melakukan Like');

    $id_foto = $this->request->getPost('id_foto');
    $id_user = session()->get('id_user'); // Assuming user ID is stored in session

    // Check if the user has already liked the photo
    $likeModel = new M_galeri(); // Make sure LikeModel is set up for tb_like_foto
    $existingLike = $likeModel->getWhere2Row('tb_like_foto',['id_foto' => $id_foto], ['id_user' => $id_user]);

    if ($existingLike > 0) {
        // User already liked the photo, so we remove the like
        $likeModel->hapus('tb_like_foto',['id_like' => $existingLike->id_like]);
        $liked = false;
    } else {
        // Add a new like
        $likeModel->tambah('tb_like_foto',[
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'tanggal_like' => date('Y-m-d')
        ]);
        $liked = true;
    }

    return $this->response->setJSON(['liked' => $liked]);
}

public function get_comments()
{

    $model = new M_galeri(); 

    $id_foto = $this->request->getPost('id_foto');
    $comments = $this->$model->where('id_foto', $id_foto)->findAll();
    return $this->response->setJSON($comments);
}

    public function foto()
	{
        if (session()->get('id_level') > 0) {
        $model=new M_galeri;

        $this->log_activity('User Membuka Menu Foto');

        $where = array('id_user' => session()->get('id_user'));
        $data['user'] = $model->getWhere('tb_user', $where);

        $where = array('tb_foto.delete_at' => NULL);

        $data['erwin'] = $model->join('tb_foto',
        'tb_album',
        'tb_foto.id_album = tb_album.id_album');

        $data['album'] = $model->tampil('tb_album');

		echo view('header', $data);
        echo view('menu', $data);
        echo view('foto', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}

public function aksi_t_foto()
{
    $model = new M_galeri();

    // Log activity for adding a photo
    $this->log_activity('User melakukan Tambah foto');

    // Retrieve form data
    $judul_foto = $this->request->getPost('judul_foto');
    $deskripsi_foto = $this->request->getPost('deskripsi_foto');
    $nama_album = $this->request->getPost('nama_album');
    $id_session_user = session()->get('id_user');

    // Initialize file name
    $lokasi_file = '';

    // Check if a file was uploaded
    if ($file = $this->request->getFile('lokasi_file')) {
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate a new random name for the file
            $newFileName = $file->getRandomName();
            // Move the file to the desired directory
            $file->move(ROOTPATH . 'public/img/avatar', $newFileName);
            // Save only the file name for database storage
            $lokasi_file = $newFileName;
        } else {
            // Handle upload error if necessary
            return redirect()->back()->with('error', 'File upload failed.');
        }
    }

    // Prepare data to insert
    $data = array(
        'judul_foto' => $judul_foto,
        'deskripsi_foto' => $deskripsi_foto,
        'tanggal_unggah' => date('Y-m-d'),
        'lokasi_file' => $lokasi_file,  // Only file name is stored
        'id_album' => $nama_album,
        'id_user' => $id_session_user,
        'create_at' => date('Y-m-d H:i:s'),
        'create_by' => $id_session_user,
    );


    // Insert data into 'tb_foto' table
    $model->tambah('tb_foto', $data);

    // Redirect with success message
    return redirect()->to('Home/foto')->with('success', 'Tambah Foto berhasil.');
}

public function aksi_e_foto()
{
    $model = new M_galeri();

    // Log activity for editing a photo
    $this->log_activity('User melakukan Edit foto');

    // Retrieve form data
    $id_foto = $this->request->getPost('id_foto');
    $judul_foto = $this->request->getPost('judul_foto');
    $deskripsi_foto = $this->request->getPost('deskripsi_foto');
    $nama_album = $this->request->getPost('nama_album');
    $id_session_user = session()->get('id_user');

    // Initialize the file name variable
    $lokasi_file = null;

    // Check if a new file was uploaded
    if ($file = $this->request->getFile('lokasi_file')) {
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate a new random name for the file
            $newFileName = $file->getRandomName();
            // Move the file to the desired directory
            $file->move(ROOTPATH . 'public/img/avatar', $newFileName);
            // Save only the file name for database storage
            $lokasi_file = $newFileName;

            // Delete the old file if a new one is uploaded
            $oldData = $model->getWhere('tb_foto', ['id_foto' => $id_foto])->getRow();
            if ($oldData && file_exists(ROOTPATH . 'public/img/avatar/' . $oldData->lokasi_file)) {
                unlink(ROOTPATH . 'public/img/avatar/' . $oldData->lokasi_file);
            }
        }
    }

    // Prepare data for update, including the new file if uploaded
    $data = [
        'judul_foto' => $judul_foto,
        'deskripsi_foto' => $deskripsi_foto,
        'id_album' => $nama_album,
        'update_at' => date('Y-m-d H:i:s'),
        'update_by' => $id_session_user,
    ];

    // Only include 'lokasi_file' in data if a new file was uploaded
    if ($lokasi_file) {
        $data['lokasi_file'] = $lokasi_file;
    }

    // Update the 'tb_foto' table with new data
    $model->edit('tb_foto', ['id_foto' => $id_foto], $data);

    // Redirect with success message
    return redirect()->to('Home/foto')->with('success', 'Edit Foto berhasil.');
}


}

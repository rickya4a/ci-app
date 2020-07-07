<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
        'err_list' => 'errors/_errors_list'
	];

	//--------------------------------------------------------------------
	// Rules
    //--------------------------------------------------------------------
    public $register = [
        'nama_pasien' => 'required|alpha_space|max_length[50]',
        'email' => 'required|valid_email',
        'username' => 'required|alpha_numeric|min_length[3]|max_length[25]|is_unique[users.username]',
        'password' => 'required|alpha_numeric|min_length[6]|max_length[50]',
        'no_hp' => 'required|numeric|min_length[10]|max_length[16]',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'tempat_lahir' => 'required',
        'alamat' => 'required|alpha_numeric_punct|max_length[255]',
        'no_ktp' => 'required|numeric|exact_length[16]',
    ];

    public $register_errors = [
        'nama_pasien' => [
            'required' => 'Nama tidak boleh kosong',
            'alpha_space' => 'Nama hanya boleh mengandung huruf dan spasi',
        ],
        'email' => [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format email tidak valid'
        ],
        'username' => [
            'required' => 'Username tidak boleh kosong',
            'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka',
            'min_length' => 'Username terlalu pendek, minimal 3 karakter',
            'max_length' => 'Username terlalu panjang, maksimal 25 karakter',
            'is_unique' => 'Username ini tidak tersedia'
        ],
        'password' => [
            'required' => 'Password tidak boleh kosong',
            'alpha_numeric' => 'Password hanya boleh mengandung huruf dan angka',
            'min_length' => 'Password terlalu pendek, minimal 6 karakter',
            'max_length' => 'Password terlalu panjang. Apakah anda yakin menghafalnya?',
        ],
        'no_hp' => [
            'required' => 'Nomor handphone harus diisi',
            'numeric' => 'Tidak mungkin nomor telepon menggunakan huruf',
            'min_length' => 'Ini nomor handphone, bukan nomor telepon kabel',
            'max_length' => 'Ini nomor handphone atau nomor KTP?'
        ],
        'alamat' => [
            'required' => 'Tolong masukkan alamat Anda',
            'alpha_numeric_punct' => 'Apakah alamat Anda dienkripsi?'
        ],
        'no_ktp' => [
            'required' => 'Apakah Anda dibawah usia 17 tahun?',
            'numeric' => 'Tolong masukkan nomor, bukan huruf',
            'exact_length' => 'Indonesia memiliki standar nomor KTP sepanjang 16 digit'
        ]
    ];

    public $auth = [
        'username' => 'required',
        'password' => 'required|min_length[6]',
    ];

    public $auth_errors = [
        'username' => [
            'required' => 'Username tidak boleh kosong'
        ],
        'password' => [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password kurang dari 6 karakter'
        ]
    ];

    public $reset_password = [
        'username' => 'required',
        'password' => 'required|min_length[6]',
        'confirm_password' => 'required|matches[password]'
    ];

    public $reset_password_errors = [
        'username' => [
            'required' => 'Username tidak boleh kosong'
        ],
        'password' => [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password harus lebih dari 6 karakter'
        ],
        'confirm_password' => [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
        ]
    ];

    public $admin_register = [
        'name' => 'required|alpha_space',
        'username' => 'required|alpha_numeric|min_length[5]|max_length[25]|is_unique[admin.username]',
        'password' => 'required|alpha_numeric|min_length[8]|max_length[50]',
        'confirm_password' => 'required|matches[password]'
    ];
}

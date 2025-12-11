# Database-3rd-1stSemester-Finals
MAO NI GAMITA PRINCE PARA SA ADMIN
gamitig php artisan tinker nya i paste ni I edit lang ang email og password


App\Models\Customer::create([
    'FirstName' => 'Super',
    'LastName' => 'Admin',
    'Email' => 'admin@quickmart.com',
    'Phone' => '1234567890',
    'Address' => 'HQ',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);

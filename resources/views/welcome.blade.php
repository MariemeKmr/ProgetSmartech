<!-- filepath: c:\Users\Hp\Documents\ESP\L3 GLSI\1er SEM\Services Réseaux Avancé\Projet-SmarTech2025\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Smarttech</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-extrabold text-gray-900">Bienvenue sur la plateforme Smarttech</h1>
            <p class="mt-4 text-lg text-gray-500">Gestion des employés, clients et documents en toute simplicité</p>
        </div>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-users fa-3x mb-3 text-blue-500"></i>
                <h3 class="text-xl font-bold mb-2">Gestion des employés</h3>
                <p class="text-gray-600">Gérez les informations de vos employés facilement.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-file-alt fa-3x mb-3 text-green-500"></i>
                <h3 class="text-xl font-bold mb-2">Gestion des documents</h3>
                <p class="text-gray-600">Organisez et accédez à vos documents en toute simplicité.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-user-tie fa-3x mb-3 text-yellow-500"></i>
                <h3 class="text-xl font-bold mb-2">Gestion des clients</h3>
                <p class="text-gray-600">Maintenez les informations de vos clients à jour.</p>
            </div>
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="inline-block bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600">Se connecter</a>
            <a href="{{ route('register') }}" class="inline-block bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600">S'inscrire</a>
        </div>
    </div>

    <!-- Lien CDN pour FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>

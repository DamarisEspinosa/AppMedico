<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Médicos</title>
</head>

<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('registrarAdmin') }}  " class=" px-4 py-4 hover:text-white">Registrar administrador</a>
            <a href=" {{ route('registrarEmpleado') }} " class=" px-4 py-4 hover:text-white">Registrar empleado</a>
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>
    
    <div class="flex items-center justify-center h-screen" style="margin-top: -5px;">
        <div class="bg-opacity-75 p-8 md:p-10 rounded-lg shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #CDD6FF;"> 
            <h2 class="text-3xl font-bold">Registro de empleado</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-empleado') }}" method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        placeholder="Nombre completo"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="fechaNacimiento" class="block text-sm font-medium">Fecha de nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" 
                        placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email"
                        placeholder="correo@ejemplo.com"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Contraseña</label>
                    <input type="password" name="password" id="password" 
                        placeholder="Contraseña"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="tipoUsuario" class="block text-sm font-medium">Tipo de usuario</label>
                    <select name="tipoUsuario" id="tipoUsuario"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="seleccionar">Seleccionar</option>
                        <option value="doctor">Doctor</option>
                        <option value="secretaria">Secretaria</option>
                        <option value="enfermera">Enfermera</option>
                    </select>
                </div>
                <div id="especialidadContainer" class="col-span-2">
                    <label for="especialidad" class="block text-sm font-medium">Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad"
                        placeholder="Especialidad"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div id="areaContainer" class="col-span-2">
                    <label for="area" class="block text-sm font-medium">Área</label>
                    <input type="text" name="area" id="area"
                        placeholder="Área"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                        style="margin-right: 16px;"
                        class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoUsuarioSelect = document.getElementById('tipoUsuario');
            const especialidadContainer = document.getElementById('especialidadContainer');
            const areaContainer = document.getElementById('areaContainer');

            function toggleEspecialidad() {
                if (tipoUsuarioSelect.value === 'doctor') {
                    areaContainer.style.display = 'none';
                    especialidadContainer.style.display = 'block';
                } else if ((tipoUsuarioSelect.value === 'enfermera') || (tipoUsuarioSelect.value === 'secretaria')) {
                    areaContainer.style.display = 'block';
                    especialidadContainer.style.display = 'none';
                } else {
                    areaContainer.style.display = 'none';
                    especialidadContainer.style.display = 'none';
                }
            }
            tipoUsuarioSelect.addEventListener('change', toggleEspecialidad);
            toggleEspecialidad();
        });
    </script>
</body>

</html>
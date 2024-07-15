<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Bienvenido doctor</title>
</head>

<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('doctor') }} " class=" px-4 py-4 hover:text-white">Pacientes</a>
            <a href=" {{ route('registrarCita') }} " class=" px-4 py-4 hover:text-white">Agendar cita</a>
            <a href=" {{ route('agenda') }} " class=" px-4 py-4 hover:text-white">Agenda</a>
            <a href=" {{ route('productos') }} " class=" px-4 py-4 hover:text-white">Productos</a> 
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 hover:text-white">Servicios</a> 
            <a href=" {{ route('ventas') }} " class=" px-4 py-4 hover:text-white">Ventas</a> 
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>

    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Pacientes</h2>
        <div class="w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Fecha de nacimiento</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                    <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">{{ $paciente->nombre }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">{{ $paciente->fechaNacimiento }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">{{ $paciente->telefono }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">{{ $paciente->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">
                            <a class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" href="#">Ver expediente</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center p-6">
        <a href=" {{ route('registrarPacientes') }} " 
           class="w-1/3 flex justify-center py-2 px-6 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
           Registrar paciente
        </a> 
    </div>
</body>

</html>

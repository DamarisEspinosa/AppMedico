<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Citas</title>
</head>

<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
<header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('doctor') }} " class=" px-4 py-4 hover:text-white">Pacientes</a>
            <a href=" {{ route('registrarCita') }} " class=" px-4 py-4 hover:text-white">Registrar cita</a>
            <a href=" {{ route('agenda') }} " class=" px-4 py-4 hover:text-white">Agenda</a>
            <a href=" {{ route('productos') }} " class=" px-4 py-4 hover:text-white">Productos</a> 
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 hover:text-white">Servicios</a> 
            <a href=" {{ route('ventas') }} " class=" px-4 py-4 hover:text-white">Ventas</a> 
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>

    <div class="flex-grow flex items-center justify-center mt-20">
        <div class="bg-opacity-75 p-8 md:p-10 rounded-lg shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #CDD6FF;"> 
        <h2 class="text-3xl font-bold">Registro de cita</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-cita') }} " method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium">Nombre del paciente</label>
                    <input type="text" name="nombre" id="nombre"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2">
                    <label for="motivos" class="block text-sm font-medium">Motivo de la cita</label>
                    <input type="text" name="motivos" id="motivos"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="doctor" class="block text-sm font-medium">Doctor</label>
                    <select name="doctor" id="doctor"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="sin-elegir">Seleccionar doctor</option>
                        <option value="1">Fabián</option>
                    </select>
                </div>
                <div>
                    <label for="fechaHora" class="block text-sm font-medium">Fecha y hora</label>
                    <input type="datetime-local" name="fechaHora" id="fechaHora"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium">¿Desea agregar un servicio?</label>
                    <input type="radio" name="servicio" id="agregar" value="agregar"><label for="agregar"> Sí</label><br>
                    <input type="radio" name="servicio" id="no-agregar" value="no-agregar"><label for="no-agregar"> No</label>
                </div>
                <div id="containerServicio">
                    <label for="servicio" class="block text-sm font-medium">Tipo de servicio</label><br>
                    <select name="servicio" id="servicio"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="sin-elegir">Seleccionar servicio</option>
                        @foreach($servicios as $servicio)
                            <option value=" {{ $servicio->id }} "> {{ $servicio->nombreServicio }} </option>
                        @endforeach
                    </select>
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
            const radioSi = document.getElementById('agregar');
            const radioNo = document.getElementById('no-agregar');
            const servicioContainer = document.getElementById('containerServicio');

            function toggleServicio() {
                if (radioSi.checked) {
                    servicioContainer.style.display = 'block';
                } else if (radioNo.checked) {
                    servicioContainer.style.display = 'none';
                } else {
                    servicioContainer.style.display = 'none';
                }
            }
            radioSi.addEventListener('change', toggleServicio);
            radioNo.addEventListener('change', toggleServicio);

            toggleServicio();
        });
    </script>
</body>
</html>
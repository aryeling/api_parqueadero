<template>
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Parqueadero 4 Ruedas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link exact-active-class="active" class="nav-link active" aria-current="page" to="/">Inicio</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link exact-active-class="active" class="nav-link" aria-current="page" to="/vehiculos">Vehiculo</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link exact-active-class="active" class="nav-link" aria-current="page" to="/propietarios">Propietario</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><router-link exact-active-class="active" class="dropdown-item" aria-current="page" to="/marcas">Marca</router-link></li>
                            <li><router-link exact-active-class="active" class="dropdown-item" aria-current="page" to="/tipo_vehiculos">Tipo de Vehiculo</router-link></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

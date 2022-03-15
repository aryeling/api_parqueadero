const Home = () =>
    import ('./components/HomeComponent.vue');

const About = { template: '<div>About</div>' }

const MostrarVehiculo = () =>
    import ('./components/vehiculo/MostrarVehiculoComponent.vue');
import ExampleComponent from "../js/components/ExampleComponent.vue";

const routes = [{
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/example',
        name: 'example',
        component: ExampleComponent
    },
    {
        path: '/vehiculos',
        name: 'mostrarVehiculos',
        component: MostrarVehiculo
    },
];

export default routes
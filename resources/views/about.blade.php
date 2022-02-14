@extends('layouts.app')

@section('content')
<div class="row gx-5">
    <div class="col-sm-4">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Agendar Citas</h5>
                <p class="card-text text-center">
                    Organiza tus citas por doctor o por proceso. Calendarios conectados en tiempo real. Opcionalmente,
                    clientes pueden auto-agendar sus citas.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Veterianarios profesionales</h5>
                <p class="card-text text-center">
                    Estandariza tus historias clínicas. Viene pre-cargado con maestros de
                    Diagnosticos, Alergias, Medicamentos y Vacunas
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Cuidado y preocupación</h5>
                <p class="card-text text-center">
                    Actuamos con interés y atención en lo que hace para que salga lo mejor posible.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Atención eficaz</h5>
                <p class="card-text text-center">
                    Reduce el tiempo de soporte. Tus clientes tienen su propio acceso para auto-agendar citas y ver
                    detalles de sus mascotas.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Auto-Recordatorios</h5>
                <p class="card-text text-center">
                    Los clientes reciben alertas automáticas de vacunas o tratamientos por vencer, asi como
                    recordatorios de citas.
                </p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="card border-0">
            <img src="{{ url('storage/img/pata.jpg') }}" class="rounded-circle mx-auto my-3" alt="..." width="80vh">
            <div class="card-body">
                <h5 class="card-title text-center">Constante Evolución</h5>
                <p class="card-text text-center">
                    ¿Tienes una idea para mejorar el sistema? Dinoslo y lo veras, sino preguntale a uno de nuestros
                    muchos clientes.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
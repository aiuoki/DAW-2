{{-- resources/views/tasks/create.blade.php --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1">Crear Tarea</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Tarea</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    body {

        background-image: url('https://farmazara.es/blog/wp-content/uploads/2023/08/flores-lavanda-al-atardecer-provenza-francia-imagen-macro-profundidad-campo-baja-hermoso-fondo-floral.jpg');
        background-size: 100% 100%;
        background-position: center;
        

        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    
    form {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    h2 {
        text-align: center;
        color: #1e3a8a;
        margin-bottom: 20px;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 16px;
        color: #333;
        margin-bottom: 5px;
    }

    input[type="text"], input[type="email"], input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        background-color: #f9fafb;
    }

    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
        border-color: #1e3a8a;
        outline: none;
        background-color: #f0f4ff;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #1e3a8a;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #3b82f6;
    }
</style>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <h2>Registro de Usuario</h2>
    
    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Correo Electrónico</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Registrar</button>
</form>

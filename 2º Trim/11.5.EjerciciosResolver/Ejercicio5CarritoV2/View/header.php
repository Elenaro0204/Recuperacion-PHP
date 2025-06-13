<?php
if (session_status() == PHP_SESSION_NONE) session_start();

$nombreUsuario = $_SESSION['usuario']['nombre'] ?? 'Invitado';
$rolUsuario = $_SESSION['usuario']['rol'] ?? 'desconocido';
?>

<style>
  header {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 15px 30px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    flex-wrap: wrap;
  }
  .user-info {
    font-weight: 600;
    font-size: 1rem;
  }
  .user-info strong {
    color: #3498db;
  }
  .logout-link {
    background-color: #e74c3c;
    color: white;
    text-decoration: none;
    padding: 8px 14px;
    border-radius: 4px;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }
  .logout-link:hover {
    background-color: #c0392b;
  }
  @media (max-width: 500px) {
    header {
      flex-direction: column;
      gap: 8px;
      text-align: center;
    }
  }
</style>

<header>
  <div class="user-info">
    Usuario: <strong><?php echo htmlspecialchars($nombreUsuario); ?></strong> |
    Rol: <strong><?php echo htmlspecialchars($rolUsuario); ?></strong>
  </div>
  <a class="logout-link" href="../Controller/logout.php">Cerrar sesión</a>
</header>

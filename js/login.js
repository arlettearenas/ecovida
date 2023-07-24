
function salir(event) {
  event.preventDefault();

  Swal.fire({
    title: '¿Estás seguro?',
    text: "Si cierras la sesión, perderás todos los cambios no guardados.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Cerrar sesión',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Aquí puedes realizar alguna acción adicional antes de redirigir
      window.location.href = "../salir.php";
    }
  });
}





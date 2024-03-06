window.onload = function() {
  Swal.fire({
    title: 'Bienvenid@ a mi página web',
    text: '¿Quieres ver la versión en ingles?',
    icon: 'question',
    showConfirmButton: true,
    confirmButtonText: 'English',
  }).then((result) => {
    if (result.value) {
      // código para redirigir a la versión en español
      window.location.href = "../index.html";
    }
  });
};

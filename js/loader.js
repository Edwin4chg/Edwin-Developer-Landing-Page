window.onload = function() {
    Swal.fire({
      title: 'Welcome to my Landing Page',
      text: 'Do you want to see the Spanish version?',
      icon: 'question',
      showConfirmButton: true,
      confirmButtonText: 'Español',
    }).then((result) => {
      if (result.value) {
        // código para redirigir a la versión en español
        window.location.href = "/es/index.html";
      }
    });
  };
  
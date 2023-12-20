// Función para validar Nombre 
function validarNombreApellido(nombre) {
  if (nombre.trim() === "") {
    alert("Nombre son campos obligatorios.");
    return false;
  }
  return true;
}

// Función para validar Alias
function validarAlias(alias) {
  if (alias.length <= 5 || !/^[a-zA-Z0-9]+$/.test(alias)) {
    alert("Alias debe tener más de 5 caracteres y contener solo letras y números.");
    return false;
  }
  return true;
}

// Validar Rut
function validarRut(rut) {
  rut = rut.trim(); // Eliminar espacios 

  // Verificar si el RUT tiene el formato correcto
  if (!/^\d{1,8}-\d$|^\d{1,2}\.\d{3}\.\d{3}-\d$/.test(rut)) {
    alert("rut no cumple con el formato.");
    return false;
  }

  // Dividir el RUT en su parte numérica y el dígito verificador
  const parts = rut.split("-");
  let num = parts[0].replace(/\./g, ''); // Eliminar puntos de separación de miles
  const dv = parts[1].toUpperCase();

  let sum = 0;
  let mul = 2;
  for (let i = num.length - 1; i >= 0; i--) {
    sum += parseInt(num[i]) * mul;
    mul = (mul % 7) + 1;
  }

  return true;
}

function validarEmail(email) {
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  return emailRegex.test(email);
}


function clean() {
  document.getElementById("nombre_apellido").value = "";
  document.getElementById("alias").value = "";
  document.getElementById("rut").value = "";
  document.getElementById("email").value = "";
  document.getElementById("region").value = "0";
  document.getElementById("comuna_id").value = "0";
  document.getElementById("candidato_id").value = "0";
}

function enviarDatosFormulario() {
  const formData = new FormData(document.getElementById("votingForm"));
  const url = "../controller/votacionesController.php";
  // Realizar una solicitud POST 
  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then(response => response.json())
    .then(data => {
      if(!data.error) {
        alert("El usuario ha votado con exito!!");
        clean();
      }else{
        alert(data.error)
      }
    })
    
}

// Función para manejar el envío del formulario
function manejarEnvioFormulario(event) {
  event.preventDefault(); // Evitar el envío tradicional del formulario
  // Realizar validaciones aquí
  const nombre = document.getElementById("nombre_apellido").value;
  const alias = document.getElementById("alias").value;
  const rut = document.getElementById("rut").value;
  const email = document.getElementById("email").value;
  if (!validarNombreApellido(nombre) || !validarAlias(alias) || !validarRut(rut) || !validarEmail(email)) {
    return;
  }

  enviarDatosFormulario();
}


// Asignar la función al evento "submit" del formulario
const votingForm = document.getElementById("votingForm");
votingForm.addEventListener("submit", manejarEnvioFormulario);


// Función para cargar las regiones desde el servidor y agregarlas al elemento select
function cargarRegionesYComunas() {
  const selectRegion = document.getElementById("region");
  const selectComuna = document.getElementById("comuna_id");
  const urlRegiones = "../controller/regionController.php";
  const urlComunas = "../controller/comunaController.php";

  selectRegion.addEventListener("change", function () {
    if (selectRegion.value === "0") {
      // Si se selecciona la opción "Seleccione una región," desactivar el campo "Comuna"
      selectComuna.disabled = true;
      selectComuna.value = "0"; // Restablecer el valor a "Seleccione una comuna"
    } else {
      // Habilitar el campo "Comuna" si se selecciona una región válida
      selectComuna.disabled = false;
    }
  });

  // Realizar una solicitud AJAX para obtener las regiones
  fetch(urlRegiones)
    .then(response => response.json())
    .then(regiones => {
      // Limpiar las opciones actuales del select de regiones
      selectRegion.innerHTML = '';
      // Limpiar las opciones actuales del select de comunas
      selectComuna.innerHTML = '';

      // Agregar la opción por defecto para regiones
      const defaultRegionOption = document.createElement("option");
      defaultRegionOption.value = "";
      defaultRegionOption.textContent = "Seleccione una región";
      selectRegion.appendChild(defaultRegionOption);

      // Agregar las regiones al select de regiones
      regiones.forEach(region => {
        const option = document.createElement("option");
        option.value = region.id;
        option.textContent = region.nombre;
        selectRegion.appendChild(option);
      });

      // Escuchar cambios en el select de regiones
      selectRegion.addEventListener("change", function () {
        const regionId = this.value;

        if (regionId !== "") {
          // Realizar una solicitud AJAX para obtener las comunas de la región seleccionada
          fetch(`${urlComunas}?region_id=${regionId}`)
            .then(response => response.json())
            .then(comunas => {
              // Limpiar las opciones actuales del select de comunas
              selectComuna.innerHTML = '';

              // Agregar la opción por defecto para comunas
              const defaultComunaOption = document.createElement("option");
              defaultComunaOption.value = "";
              defaultComunaOption.textContent = "Seleccione una comuna";
              selectComuna.appendChild(defaultComunaOption);

              // Agregar las comunas al select de comunas
              comunas.forEach(comuna => {
                const option = document.createElement("option");
                option.value = comuna.id;
                option.textContent = comuna.nombre;
                selectComuna.appendChild(option);
              });
            })
            .catch(error => {
              console.error("Error al cargar comunas: " + error);
            });
        } else {
          // Si se selecciona "Seleccione una región," limpiar y desactivar el select de comunas.
          selectComuna.innerHTML = '';
          const defaultComunaOption = document.createElement("option");
          defaultComunaOption.value = "";
          defaultComunaOption.textContent = "Seleccione una comuna";
          selectComuna.appendChild(defaultComunaOption);
          selectComuna.disabled = true;
        }
      });
    })
    .catch(error => {
      console.error("Error al cargar la Comuna: " + error);
    });
}

// Llamar a la función para cargar regiones y comunas al cargar la página
cargarRegionesYComunas();


// Función para cargar los candidatos desde el servidor y agregarlas al elemento select
function cargarCandidatos() {
  const selectCandidato = document.getElementById("candidato_id");
  const urlCandidato = "../controller/candidatoController.php";

  // Realizar una solicitud AJAX para obtener los candidatos
  fetch(urlCandidato)
    .then(response => response.json())
    .then(candidatos => {
      // Limpiar las opciones actuales del select
      selectCandidato.innerHTML = '';


      // Agregar la opción por defecto para candidatos
      const defaultCandidato = document.createElement("option");
      defaultCandidato.value = "";
      defaultCandidato.textContent = "Seleccione un candidato";
      selectCandidato.appendChild(defaultCandidato);

      // Agregar los candidatos al select de candidato
      candidatos.forEach(candidato => {
        const option = document.createElement("option");
        option.value = candidato.id;
        option.textContent = candidato.name;
        selectCandidato.appendChild(option);
      });
    })
    .catch(error => {
      console.error("Error al cargar los Candidatos: " + error);
    });
}

cargarCandidatos();

function cargarEncuestas() {
  const checkboxGroup = document.getElementById("encuestas");
  const urlEncuestas = "../controller/nosotrosController.php";

  // Realizar una solicitud AJAX para obtener las encuestas
  fetch(urlEncuestas)
    .then(response => response.json())
    .then(encuestas => {
      // Limpiar el contenido actual de la lista de casillas de verificación
      checkboxGroup.innerHTML = '';

      encuestas.forEach(encuesta => {
        const checkboxDiv = document.createElement("div");
        checkboxDiv.classList.add("checkbox-item");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "encuesta[]"; // Puede ser un arreglo si se permiten múltiples selecciones
        checkbox.value = encuesta.id;
        checkbox.id = `encuesta_${encuesta.id}`;
        // Puedes establecer un atributo "checked" aquí si deseas que algunas casillas estén marcadas por defecto

        const label = document.createElement("label");
        label.setAttribute("for", `encuesta_${encuesta.id}`);
        label.textContent = encuesta.description;

        checkboxDiv.appendChild(checkbox);
        checkboxDiv.appendChild(label);

        checkboxGroup.appendChild(checkboxDiv);
      });
    })
    .catch(error => {
      console.error("Error al cargar encuestas: " + error);
    });
}

cargarEncuestas();


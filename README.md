S-CASH

El proyecto consiste en un sistema de control que permite manejar las asistencias mediante un lector biométrico con el que se puede comprobar la identidad de los usuarios. 
Para poder acceder a las instalaciones se debe de colocar el dedo pulgar en el lector de huella para así poder verificar la identidad del usuario y registrar su hora de entrada y salida. Este sistema permite que se pueda corroborar los usuarios y sus horarios exactos, garantizando las asistencias de los alumnos de Practicas Profesionalizantes.
El sistema en total almacenará la información de asistencia del personal, y el resto de sus datos también. A base de esto se pueden calcular las horas trabajadas (o en el caso de alumnos, el porcentaje de asistencia y horas en clase), sabiendo que los datos son verdaderos.
Este sistema permite una validación de identidad más efectiva que otros métodos (como un método mediante una tarjeta o carnet) ya que otra persona no puede acceder con la identificación de otra. También permite que los ingresantes no necesiten llevar una identificación física, haciendo más simple el proceso.
Este proyecto incluye funcionalidades de administración, registro y consulta mediante interfaces amigables.

Características

Gestión de usuarios: Registro, modificación y eliminación de usuarios.

Administración de datos: Consultas y confirmación de registros.

Interfaz moderna y accesible: Uso de tooltips y diseño responsive.

Seguridad básica: Validación de datos y prevención de errores comunes.

Tecnologías utilizadas

Frontend:

HTML5, CSS3

Google Fonts para tipografías modernas

Backend:

PHP para la lógica del servidor

MySQL para la gestión de la base de datos

Herramientas adicionales:

Bootstrap (opcional, si lo usas)

Íconos personalizados en Media/

Estructura del proyecto

scash3/
├── Media/                  # Archivos multimedia como íconos y logos
├── imagen.css              # Estilos generales
├── tooltip.css             # Estilos específicos para tooltips
├── index.html              # Página principal
├── [otros archivos PHP]    # Funciones backend
└── scash.sql               # Script de base de datos


# sml-gitflow
Práctica 1.1 - Estrategias de branching. Gitflow.

---

## Aplicación de consulta de temario
El proyecto plantea una aplicación web sencilla donde los alumnos pueden consultar el temario de sus asignaturas, seguir las clases y repasar por su cuenta.
Los profesores tienen el rol de administrador y se encargan de subir y actualizar los materiales. Así, los alumnos pueden encontrar en un mismo lugar el temario actualizado de cada asignatura.
## Nomenclatura del repositorio
### Ramas
- ![main](https://img.shields.io/badge/main-FFD54F?style=flat-square) Rama de producción. Contiene el código preparado para producción.
- ![develop](https://img.shields.io/badge/develop-FFD54F?style=flat-square) Rama de desarrollo. Reúne los cambios de la siguiente versión.
- ![feature/nombre-funcionalidad](https://img.shields.io/badge/feature%2Fnombre--funcionalidad-FFE082?style=flat-square) Creamos una rama por funcionalidad. Usamos minúsculas y separamos las palabras con guiones.
- ![release/1.0.0](https://img.shields.io/badge/release%2F1.0.0-FFE082?style=flat-square) Reúne los ajustes finales de la primera versión.
- ![hotfix/1.0.1](https://img.shields.io/badge/hotfix%2F1.0.1-FFE082?style=flat-square) Contiene la corrección de un fallo de la primera versión.
### Etiquetas de versión
- ![v1.0.0](https://img.shields.io/badge/v1.0.0-FFF0B3?style=flat-square) Identifica en main el commit de la primera versión.
- ![v1.0.1](https://img.shields.io/badge/v1.0.1-FFF0B3?style=flat-square) Identifica en main el commit de la versión corregida.
### Mensajes de commit
- ![Prefijo FEATURE](https://img.shields.io/badge/%5BFEATURE%5D-FFF5CC?style=flat-square) Usamos este prefijo seguido de una descripción breve, como [FEATURE] Añade la consulta de temario.

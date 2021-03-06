<?php

use Carbon\Carbon;
use ConvAux\Announcement;
use ConvAux\AnnouncementDates;
use ConvAux\AnnouncementRequest;
use ConvAux\ConvocatoriaTipo;
use ConvAux\Requirement;
use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convocatoriaADocencia = new ConvocatoriaTipo();
        $convocatoriaADocencia->name = "Auxiliatura para docencia";
        $convocatoriaADocencia->description = "Este tipo de convocatoria es para auxiliares a pizzarra.";
        $convocatoriaADocencia->save();

        $convocatoriaALaboratorio = new ConvocatoriaTipo();
        $convocatoriaALaboratorio->name = "Auxiliatura en laboratorio";
        $convocatoriaALaboratorio->description = "Este tipo de convocatoria es para auxiliares de laboratorio, de cómputo.";
        $convocatoriaALaboratorio->save();

        // Convocatorias
        $announcement = new Announcement();
        $announcement->name = 'CONV-01-20';
        $announcement->title = 'Convocatoria de prueba';
        $announcement->description = 'Esta convocatoria es de prueba, asi que es la primera';
        $announcement->management_id = 1;
        $announcement->announcement_type_id = 1;
        $announcement->status = 'CREADO';
        $announcement->save();

        $announcement = new Announcement();
        $announcement->name = 'CONV-DOC-20';
        $announcement->title = 'CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE CONOCIMIENTOS PARA OPTAR A AUXILIATURAS DE DOCENCIA';
        $announcement->description = 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing. De Sistemas de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y examen de competencia para la provisión de Auxiliares del Departamento,tomando como base los requerimientos que se tienen programados para la gestión 2020.';
        $announcement->management_id = 1;
        $announcement->announcement_type_id = 1;
        $announcement->status = 'CREADO';
        $announcement->save();

        $announcement = new Announcement();
        $announcement->name = 'CONV-LAB-20';
        $announcement->title = 'CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE CONOCIMIENTOS PARA OPTAR A AUXILIATURAS EN LABORATORIO DE COMPUTACIÓN, DE MANTENIMIENTO Y DESARROLLO';
        $announcement->description = 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing. de Sistemas, de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y examen de competencia para la provisión de Auxiliares del Departamento, tomando como base los requerimientos que se tienen programados para la gestión 2020.';
        $announcement->management_id = 1;
        $announcement->announcement_type_id = 2;
        $announcement->status = 'CREADO';
        $announcement->save();

        // Requisitos para la segunda convocatoria: DOCENCIA
        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Ser estudiante regular y con rendimiento académico de las carreras de
        Licenciatura en Ingeniería Informática o Licenciatura en Ingeniería de Sistemas,
        que cursa regularmente en la Universidad. Para las materias de Introducción a la
        Programación y Elementos de Programación y Estructura de Datos, podrán
        presentarse además estudiantes de Ing. Electrónica. Para la materia de
        Computación I podrán presentarse además estudiantes de Ing. Industrial, Ing.
        Mecánica, Ing. Eléctrica, Ing. Electro-Mecánica e Ing. Matemática. Estudiante
        regular es aquel que está inscrito en la gestión académica vigente y cumple los
        requisitos exigidos para seguir una carrera universitaria y el rendimiento
        académico, haber aprobado más de la mitad de las materias curriculares que
        corresponde al semestre anterior, certificado por el departamento de Registros
        e Inscripciones.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CERTIFICADO DE CONDICION DE ESTUDIANTE';
        $announcementRequirements->description = 'Presentar certificado de condición de estudiante expedido por el Departamento
        de Registros e Inscripciones.';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'O haber concluido el pensum con la totalidad de materias, teniendo pendiente
        tan solo la aprobación de la Modalidad de Graduación, pudiendo postular a la
        Auxiliatura Universitaria dentro del siguiente periodo académico (dos años o
        cuatro semestres), a partir de la fecha de conclusión de pensum de materias.
        Este periodo de dos años adicionales a los que contempla la conclusión del
        pensum de materias no podrá ampliarse bajo circunstancia alguna, aún en caso
        de encontrarse cursando otra carrera.';
        $announcementRequirements->doc = 'NO';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Queda expresamente prohibido la participación de estudiantes que hubiesen
        obtenido ya un título profesional en alguna de las carreras de la Universidad
        Mayor de San Simon o de cualquier otra del Sistema de la Universidad Boliviana
        (RCU No. 63/2018). Aún en caso de encontrarse cursando otra carrera con
        admisión especial. (Certificación emitida por el Departamento de Registros e
        Inscripciones).';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'KARDEX ACTUALIZADO';
        $announcementRequirements->description = 'Kardex actualizado a la gestión(periodos cumplidos a la fecha), expedido
        por oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Haber Aprobado la totalidad de las materias del semestre a la materia a la que
        se postula.';
        $announcementRequirements->doc = 'NO';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'No tener deudas de libros en la biblioteca de la FCyT.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CERTIFICADO DE LA BIBLIOTECA';
        $announcementRequirements->description = 'Certificado expedido por la biblioteca de la Facultad De Ciencias y Tecnología de
        no tener deudas de libros.';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Participar y aprobar el Concurso de Méritos y proceso de pruebas de selección y
        admisión, conforme a convocatoria.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CURRICULUM VITAE';
        $announcementRequirements->description = 'Presentar resumen de currículum Vitae de acuerdo al subtítulo 6.- DE LA
        CALIFICACIÓN DE MÉRITOS de esta convocatoria';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $announcementRequirements->title = 'SOLICITUD ESCRITA PARA AUXILIATURA';
        $announcementRequirements->description = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar una fotocopia de su carnet de identidad';
        $announcementRequirements->title = 'FOTOCOPIA CARNET DE IDENTIDAD';
        $announcementRequirements->description = 'Presentar una fotocopia de su carnet de identidad';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $announcementRequirements->title = 'DOCUMENTO QUE RESPALDE EL CURRICULUM VITAE';
        $announcementRequirements->description = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 2;
        $announcementRequirements->save();

        // Fechas para la segunda convocatoria: DOCENCIA        
        $announcementDates = new AnnouncementDates();
        $announcementDates->publication_date = Carbon::create(2020, 2, 18);
        $announcementDates->docs_presentation = Carbon::create(2020, 3, 3);
        $announcementDates->docs_location = 'Secretaría del departamento de informática y sistemas.';
        $announcementDates->publication_of_enabled = Carbon::create(2020, 3, 5);
        $announcementDates->claims_presentation = Carbon::create(2020, 3, 7);
        $announcementDates->claims_location = 'Secretaría del departamento de informática y sistemas.';
        $announcementDates->phase_tests = Carbon::create(2020, 3, 17);
        $announcementDates->publication_results = Carbon::create(2020, 3, 21);
        $announcementDates->announcement_id = 2;
        $announcementDates->save();

        // Requerimientos para la segunda convocatoria: DOCENCIA
        $announcementRequest = new AnnouncementRequest();
        $announcementRequest->assistant_amount = 8;
        $announcementRequest->academic_hours = 8;
        $announcementRequest->auxiliary_code = 'DOC-I-INT';
        $announcementRequest->auxiliary_name = 'Introducción a la programación';
        $announcementRequest->announcement_id = 2;
        $announcementRequest->save();

        $announcementRequest = new AnnouncementRequest();
        $announcementRequest->assistant_amount = 4;
        $announcementRequest->academic_hours = 8;
        $announcementRequest->auxiliary_code = 'DOC-II-ELE';
        $announcementRequest->auxiliary_name = 'Elementos y estructuras de la programación';
        $announcementRequest->announcement_id = 2;
        $announcementRequest->save();

        // Requisitos para la tercera convocatoria: LABORATORIO
        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Ser estudiante regular y con rendimiento de las carreras de Licenciatura en Ingeniería
        Informática o Licenciatura en Ingeniería de Sistemas y/o afín, que cursa regularmente en la
        universidad. Para administrador de Laboratorio de Mantenimiento de Hardware podrán
        presentarse además estudiantes de Ing. Electrónica. Estudiante regular es aquel que está
        inscrito en la gestión académica vigente y cumple los requisitos exigidos para seguir una
        carrera universitaria y el rendimiento académico, haber aprobado más de la mitad de las
        materias curriculares que corresponde al semestre anterior, certificado por el
        departamento de Registros e Inscripciones.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CERTIFICADO DE CONDICION DE ESTUDIANTE';
        $announcementRequirements->description = 'Presentar certificado de condición de estudiante expedido por el Departamento
        de Registros e Inscripciones.';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'O haber concluido el pensum con la totalidad de materias, teniendo pendiente tan solo la
        aprobación de la Modalidad de Graduación, pudiendo postular a la Auxiliatura Universitaria
        dentro del siguiente periodo académico (dos años o cuatro semestres), a partir de la fecha
        de conclusión de pensum de materias. Este periodo de dos años adicionales a los que
        contempla la conclusión del pensum de materias no podrá ampliarse bajo circunstancia
        alguna, aún en caso de encontrarse cursando otra carrera.';
        $announcementRequirements->doc = 'NO';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Queda expresamente prohibido la participación de estudiantes que hubiesen obtenido ya
        un título profesional en alguna de las carreras de la Universidad Mayor de San Simón o de
        cualquier otra del Sistema de la Universidad Boliviana (RCU No. 63/2018). Aún en caso de
        encontrarse cursando otra carrera con admisión especial. (Certificación emitida por el
        Departamento de Registros e Inscripciones).';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'KARDEX ACTUALIZADO';
        $announcementRequirements->description = 'Kardex actualizado a la gestión(periodos cumplidos a la fecha), expedido
        por oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();
        
        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Haber vencido la totalidad de las asignaturas del tercer año o el sexto semestre de la carrera
        que cursa.';
        $announcementRequirements->doc = 'NO';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'No tener deudas de libros en la biblioteca de la FCyT.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CERTIFICADO DE LA BIBLIOTECA';
        $announcementRequirements->description = 'Certificado expedido por la biblioteca de la Facultad De Ciencias y Tecnología de
        no tener deudas de libros.';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();


        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Participar y aprobar el Concurso de Méritos y proceso de pruebas de selección y admisión,
        conforme a convocatoria.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->title = 'CURRICULUM VITAE';
        $announcementRequirements->description = 'Presentar resumen de currículum Vitae de acuerdo al subtítulo 6.- DE LA
        CALIFICACIÓN DE MÉRITOS de esta convocatoria';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $announcementRequirements->title = 'SOLICITUD ESCRITA PARA AUXILIATURA';
        $announcementRequirements->description = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar una fotocopia de su carnet de identidad';
        $announcementRequirements->title = 'FOTOCOPIA CARNET DE IDENTIDAD';
        $announcementRequirements->description = 'Presentar una fotocopia de su carnet de identidad';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();

        $announcementRequirements = new Requirement();
        $announcementRequirements->requirement = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $announcementRequirements->title = 'DOCUMENTO QUE RESPALDE EL CURRICULUM VITAE';
        $announcementRequirements->description = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $announcementRequirements->doc = 'SI';
        $announcementRequirements->announcement_id = 3;
        $announcementRequirements->save();
        
        // Fechas para la tercera convocatoria LABORATORIO
        $announcementDates = new AnnouncementDates();
        $announcementDates->publication_date = Carbon::create(2020, 2, 18);
        $announcementDates->docs_presentation = Carbon::create(2020, 3, 3);
        $announcementDates->docs_location = 'Secretaría del departamento de informática y sistemas.';
        $announcementDates->publication_of_enabled = Carbon::create(2020, 3, 5);
        $announcementDates->claims_presentation = Carbon::create(2020, 3, 7);
        $announcementDates->claims_location = 'Secretaría del departamento de informática y sistemas.';
        $announcementDates->phase_tests = Carbon::create(2020, 3, 17);
        $announcementDates->publication_results = Carbon::create(2020, 3, 21);
        $announcementDates->announcement_id = 3;
        $announcementDates->save();        

        // Requerimientos para la segunda convocatoria LABORATORIO
        $announcementRequest = new AnnouncementRequest();
        $announcementRequest->assistant_amount = 8;
        $announcementRequest->academic_hours = 8;
        $announcementRequest->auxiliary_code = 'LAB-I-INT';
        $announcementRequest->auxiliary_name = 'Introducción a la programación';
        $announcementRequest->announcement_id = 3;
        $announcementRequest->save();

        $announcementRequest = new AnnouncementRequest();
        $announcementRequest->assistant_amount = 4;
        $announcementRequest->academic_hours = 8;
        $announcementRequest->auxiliary_code = 'LAB-II-ELE';
        $announcementRequest->auxiliary_name = 'Elementos y estructuras de la programación';
        $announcementRequest->announcement_id = 3;
        $announcementRequest->save();
    }
}

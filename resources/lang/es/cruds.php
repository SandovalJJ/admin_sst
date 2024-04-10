<?php

return [
    'userManagement' => [
        'title'          => 'Gestionar usuarios',
        'title_singular' => 'Gestionar usuarios',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'funcionario' => [
        'title'          => 'Funcionario',
        'title_singular' => 'Funcionario',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'n_identificacion'        => 'N Identificacion',
            'n_identificacion_helper' => ' ',
            'nombre'                  => 'Nombre',
            'nombre_helper'           => ' ',
            'genero'                  => 'Genero',
            'genero_helper'           => ' ',
            'f_nacimiento'            => 'F Nacimiento',
            'f_nacimiento_helper'     => ' ',
            'celular'                 => 'Celular',
            'celular_helper'          => ' ',
            'direccion'               => 'Direccion',
            'direccion_helper'        => ' ',
            'cargo'                   => 'Cargo',
            'cargo_helper'            => ' ',
            'sede'                    => 'Sede',
            'sede_helper'             => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'asistencium' => [
        'title'          => 'Asistencia',
        'title_singular' => 'Asistencium',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'n_identificacion'        => 'Identificación',
            'n_identificacion_helper' => ' ',
            'asistio'                 => 'Asistio',
            'asistio_helper'          => ' ',
            'fecha'                   => 'Fecha',
            'fecha_helper'            => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'planear' => [
        'title'          => 'Planear',
        'title_singular' => 'Planear',
    ],
    'hacer' => [
        'title'          => 'Hacer',
        'title_singular' => 'Hacer',
    ],
    'presupuesto' => [
        'title'          => 'Presupuesto',
        'title_singular' => 'Presupuesto',
    ],
    'cronoCap' => [
        'title'          => 'Cronograma Capacitación',
        'title_singular' => 'Cronograma Capacitación',
    ],
    'seguridadSy' => [
        'title'          => 'Seguridad y salud',
        'title_singular' => 'Seguridad y salud',
    ],
    'politicaSst' => [
        'title'          => 'Politica SG-SST',
        'title_singular' => 'Politica SG-SST',
    ],
    'objetivosDelSistema' => [
        'title'          => 'Objetivos Del Sistema',
        'title_singular' => 'Objetivos Del Sistema',
    ],
    'evaluaciongestion' => [
        'title'          => 'Evaluacion SG',
        'title_singular' => 'Evaluacion SG',
    ],
    'planDeTrabajo' => [
        'title'          => 'Plan De Trabajo',
        'title_singular' => 'Plan De Trabajo',
    ],
    'controlDocumental' => [
        'title'          => 'Control Documental',
        'title_singular' => 'Control Documental',
    ],
    'rendicionCuentum' => [
        'title'          => 'Rendición de Cuentas',
        'title_singular' => 'Rendición de Cuenta',
    ],
    'matrizLegal' => [
        'title'          => 'Matriz Legal',
        'title_singular' => 'Matriz Legal',
    ],
    'manualContratistum' => [
        'title'          => 'Manual de Contratistas',
        'title_singular' => 'Manual de Contratista',
    ],
    'gestionDelCambio' => [
        'title'          => 'Gestion Del Cambio',
        'title_singular' => 'Gestion Del Cambio',
    ],
    'diagnosticoSalud' => [
        'title'          => 'Condiciones de salud',
        'title_singular' => 'Condiciones de salud',
    ],
    'examenesMedico' => [
        'title'          => 'Examenes Medicos',
        'title_singular' => 'Examenes Medico',
    ],
    'restriccionesYRecomendacione' => [
        'title'          => 'R y R',
        'title_singular' => 'R y R',
    ],
    'reintegroLaboral' => [
        'title'          => 'Reintegro Laboral',
        'title_singular' => 'Reintegro Laboral',
    ],
    'custodiaDeHistoriasClinica' => [
        'title'          => 'Historias Clínicas',
        'title_singular' => 'Historias Clínica',
    ],
    'pausasActiva' => [
        'title'          => 'Pausas Activas',
        'title_singular' => 'Pausas Activa',
    ],
    'estiloDeVidaSaludable' => [
        'title'          => 'Estilo De Vida Saludable',
        'title_singular' => 'Estilo De Vida Saludable',
    ],
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned to',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tasksCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],

];

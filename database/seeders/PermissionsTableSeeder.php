<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'funcionario_create',
            ],
            [
                'id'    => 18,
                'title' => 'funcionario_edit',
            ],
            [
                'id'    => 19,
                'title' => 'funcionario_show',
            ],
            [
                'id'    => 20,
                'title' => 'funcionario_delete',
            ],
            [
                'id'    => 21,
                'title' => 'funcionario_access',
            ],
            [
                'id'    => 22,
                'title' => 'asistencium_create',
            ],
            [
                'id'    => 23,
                'title' => 'asistencium_edit',
            ],
            [
                'id'    => 24,
                'title' => 'asistencium_show',
            ],
            [
                'id'    => 25,
                'title' => 'asistencium_delete',
            ],
            [
                'id'    => 26,
                'title' => 'asistencium_access',
            ],
            [
                'id'    => 27,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 28,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 29,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 30,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 31,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 33,
                'title' => 'planear_access',
            ],
            [
                'id'    => 34,
                'title' => 'hacer_access',
            ],
            [
                'id'    => 35,
                'title' => 'presupuesto_create',
            ],
            [
                'id'    => 36,
                'title' => 'presupuesto_edit',
            ],
            [
                'id'    => 37,
                'title' => 'presupuesto_show',
            ],
            [
                'id'    => 38,
                'title' => 'presupuesto_delete',
            ],
            [
                'id'    => 39,
                'title' => 'presupuesto_access',
            ],
            [
                'id'    => 40,
                'title' => 'crono_cap_create',
            ],
            [
                'id'    => 41,
                'title' => 'crono_cap_edit',
            ],
            [
                'id'    => 42,
                'title' => 'crono_cap_show',
            ],
            [
                'id'    => 43,
                'title' => 'crono_cap_delete',
            ],
            [
                'id'    => 44,
                'title' => 'crono_cap_access',
            ],
            [
                'id'    => 45,
                'title' => 'seguridad_sy_create',
            ],
            [
                'id'    => 46,
                'title' => 'seguridad_sy_edit',
            ],
            [
                'id'    => 47,
                'title' => 'seguridad_sy_show',
            ],
            [
                'id'    => 48,
                'title' => 'seguridad_sy_delete',
            ],
            [
                'id'    => 49,
                'title' => 'seguridad_sy_access',
            ],
            [
                'id'    => 50,
                'title' => 'politica_sst_create',
            ],
            [
                'id'    => 51,
                'title' => 'politica_sst_edit',
            ],
            [
                'id'    => 52,
                'title' => 'politica_sst_show',
            ],
            [
                'id'    => 53,
                'title' => 'politica_sst_delete',
            ],
            [
                'id'    => 54,
                'title' => 'politica_sst_access',
            ],
            [
                'id'    => 55,
                'title' => 'objetivos_del_sistema_create',
            ],
            [
                'id'    => 56,
                'title' => 'objetivos_del_sistema_edit',
            ],
            [
                'id'    => 57,
                'title' => 'objetivos_del_sistema_show',
            ],
            [
                'id'    => 58,
                'title' => 'objetivos_del_sistema_delete',
            ],
            [
                'id'    => 59,
                'title' => 'objetivos_del_sistema_access',
            ],
            [
                'id'    => 60,
                'title' => 'evaluaciongestion_create',
            ],
            [
                'id'    => 61,
                'title' => 'evaluaciongestion_edit',
            ],
            [
                'id'    => 62,
                'title' => 'evaluaciongestion_show',
            ],
            [
                'id'    => 63,
                'title' => 'evaluaciongestion_delete',
            ],
            [
                'id'    => 64,
                'title' => 'evaluaciongestion_access',
            ],
            [
                'id'    => 65,
                'title' => 'plan_de_trabajo_create',
            ],
            [
                'id'    => 66,
                'title' => 'plan_de_trabajo_edit',
            ],
            [
                'id'    => 67,
                'title' => 'plan_de_trabajo_show',
            ],
            [
                'id'    => 68,
                'title' => 'plan_de_trabajo_delete',
            ],
            [
                'id'    => 69,
                'title' => 'plan_de_trabajo_access',
            ],
            [
                'id'    => 70,
                'title' => 'control_documental_create',
            ],
            [
                'id'    => 71,
                'title' => 'control_documental_edit',
            ],
            [
                'id'    => 72,
                'title' => 'control_documental_show',
            ],
            [
                'id'    => 73,
                'title' => 'control_documental_delete',
            ],
            [
                'id'    => 74,
                'title' => 'control_documental_access',
            ],
            [
                'id'    => 75,
                'title' => 'rendicion_cuentum_create',
            ],
            [
                'id'    => 76,
                'title' => 'rendicion_cuentum_edit',
            ],
            [
                'id'    => 77,
                'title' => 'rendicion_cuentum_show',
            ],
            [
                'id'    => 78,
                'title' => 'rendicion_cuentum_delete',
            ],
            [
                'id'    => 79,
                'title' => 'rendicion_cuentum_access',
            ],
            [
                'id'    => 80,
                'title' => 'matriz_legal_create',
            ],
            [
                'id'    => 81,
                'title' => 'matriz_legal_edit',
            ],
            [
                'id'    => 82,
                'title' => 'matriz_legal_show',
            ],
            [
                'id'    => 83,
                'title' => 'matriz_legal_delete',
            ],
            [
                'id'    => 84,
                'title' => 'matriz_legal_access',
            ],
            [
                'id'    => 85,
                'title' => 'manual_contratistum_create',
            ],
            [
                'id'    => 86,
                'title' => 'manual_contratistum_edit',
            ],
            [
                'id'    => 87,
                'title' => 'manual_contratistum_show',
            ],
            [
                'id'    => 88,
                'title' => 'manual_contratistum_delete',
            ],
            [
                'id'    => 89,
                'title' => 'manual_contratistum_access',
            ],
            [
                'id'    => 90,
                'title' => 'gestion_del_cambio_create',
            ],
            [
                'id'    => 91,
                'title' => 'gestion_del_cambio_edit',
            ],
            [
                'id'    => 92,
                'title' => 'gestion_del_cambio_show',
            ],
            [
                'id'    => 93,
                'title' => 'gestion_del_cambio_delete',
            ],
            [
                'id'    => 94,
                'title' => 'gestion_del_cambio_access',
            ],
            [
                'id'    => 95,
                'title' => 'diagnostico_salud_create',
            ],
            [
                'id'    => 96,
                'title' => 'diagnostico_salud_edit',
            ],
            [
                'id'    => 97,
                'title' => 'diagnostico_salud_show',
            ],
            [
                'id'    => 98,
                'title' => 'diagnostico_salud_delete',
            ],
            [
                'id'    => 99,
                'title' => 'diagnostico_salud_access',
            ],
            [
                'id'    => 100,
                'title' => 'examenes_medico_create',
            ],
            [
                'id'    => 101,
                'title' => 'examenes_medico_edit',
            ],
            [
                'id'    => 102,
                'title' => 'examenes_medico_show',
            ],
            [
                'id'    => 103,
                'title' => 'examenes_medico_delete',
            ],
            [
                'id'    => 104,
                'title' => 'examenes_medico_access',
            ],
            [
                'id'    => 105,
                'title' => 'restricciones_y_recomendacione_create',
            ],
            [
                'id'    => 106,
                'title' => 'restricciones_y_recomendacione_edit',
            ],
            [
                'id'    => 107,
                'title' => 'restricciones_y_recomendacione_show',
            ],
            [
                'id'    => 108,
                'title' => 'restricciones_y_recomendacione_delete',
            ],
            [
                'id'    => 109,
                'title' => 'restricciones_y_recomendacione_access',
            ],
            [
                'id'    => 110,
                'title' => 'reintegro_laboral_create',
            ],
            [
                'id'    => 111,
                'title' => 'reintegro_laboral_edit',
            ],
            [
                'id'    => 112,
                'title' => 'reintegro_laboral_show',
            ],
            [
                'id'    => 113,
                'title' => 'reintegro_laboral_delete',
            ],
            [
                'id'    => 114,
                'title' => 'reintegro_laboral_access',
            ],
            [
                'id'    => 115,
                'title' => 'custodia_de_historias_clinica_create',
            ],
            [
                'id'    => 116,
                'title' => 'custodia_de_historias_clinica_edit',
            ],
            [
                'id'    => 117,
                'title' => 'custodia_de_historias_clinica_show',
            ],
            [
                'id'    => 118,
                'title' => 'custodia_de_historias_clinica_delete',
            ],
            [
                'id'    => 119,
                'title' => 'custodia_de_historias_clinica_access',
            ],
            [
                'id'    => 120,
                'title' => 'pausas_activa_create',
            ],
            [
                'id'    => 121,
                'title' => 'pausas_activa_edit',
            ],
            [
                'id'    => 122,
                'title' => 'pausas_activa_show',
            ],
            [
                'id'    => 123,
                'title' => 'pausas_activa_delete',
            ],
            [
                'id'    => 124,
                'title' => 'pausas_activa_access',
            ],
            [
                'id'    => 125,
                'title' => 'estilo_de_vida_saludable_create',
            ],
            [
                'id'    => 126,
                'title' => 'estilo_de_vida_saludable_edit',
            ],
            [
                'id'    => 127,
                'title' => 'estilo_de_vida_saludable_show',
            ],
            [
                'id'    => 128,
                'title' => 'estilo_de_vida_saludable_delete',
            ],
            [
                'id'    => 129,
                'title' => 'estilo_de_vida_saludable_access',
            ],
            [
                'id'    => 130,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 131,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 132,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 133,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 134,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 135,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 136,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 137,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 138,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 139,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 140,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 141,
                'title' => 'task_create',
            ],
            [
                'id'    => 142,
                'title' => 'task_edit',
            ],
            [
                'id'    => 143,
                'title' => 'task_show',
            ],
            [
                'id'    => 144,
                'title' => 'task_delete',
            ],
            [
                'id'    => 145,
                'title' => 'task_access',
            ],
            [
                'id'    => 146,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 147,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

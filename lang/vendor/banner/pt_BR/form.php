<?php

return [
    'tabs' => [
        'general' => 'Geral',
        'styling' => 'Estilo',
        'scheduling' => 'Agendamento',
    ],
    'fields' => [
        'id' => 'ID',
        'name' => 'Nome',
        'content' => 'Conteúdo',
        'render_location' => 'Local de exibição',
        'render_location_help' => 'Ao escolher o local de exibição, você pode definir onde o banner será exibido na página. Em combinação com as áreas de aplicação, isso se torna uma ferramenta poderosa para gerenciar onde e quando seus banners aparecem. Você pode optar por exibir banners no cabeçalho, na barra lateral ou em outros locais estratégicos para maximizar sua visibilidade e impacto.',
        'render_location_options' => [
            'panel' => [
                'header' => 'Cabeçalho',
                'page_start' => 'Início da página',
                'page_end' => 'Fim da página',
            ],
            'authentication' => [
                'login_form_before' => 'Antes do formulário de login',
                'login_form_after' => 'Após o formulário de login',
                'password_reset_form_before' => 'Antes do formulário de redefinição de senha',
                'password_reset_form_after' => 'Após o formulário de redefinição de senha',
                'register_form_before' => 'Antes do formulário de registro',
                'register_form_after' => 'Após o formulário de registro',
            ],
            'global_search' => [
                'before' => 'Antes da pesquisa global',
                'after' => 'Após a pesquisa global',
            ],
            'page_widgets' => [
                'header_before' => 'Antes dos widgets do cabeçalho',
                'header_after' => 'Após os widgets do cabeçalho',
                'footer_before' => 'Antes dos widgets do rodapé',
                'footer_after' => 'Após os widgets do rodapé',
            ],
            'sidebar' => [
                'nav_start' => 'Antes da navegação da barra lateral',
                'nav_end' => 'Após a navegação da barra lateral',
            ],
            'resource_table' => [
                'before' => 'Antes da tabela de recursos',
                'after' => 'Após a tabela de recursos',
            ],
        ],
        'scope' => 'Escopo de aplicação',
        'scope_help' => 'Com o escopo de aplicação, você pode controlar onde seu banner será exibido. É possível direcionar o banner para páginas específicas ou para recursos de forma geral, garantindo que seja exibido para o público certo no momento certo.',
        'options' => 'Opções',
        'can_be_closed_by_user' => 'O banner pode ser fechado pelo usuário',
        'can_truncate_message' => 'Truncar conteúdo do banner',
        'is_active' => 'Ativo',
        'text_color' => 'Cor do texto',
        'icon' => 'Ícone',
        'icon_color' => 'Cor do ícone',
        'background' => 'Fundo',
        'background_type' => 'Tipo de fundo',
        'background_type_solid' => 'Sólido',
        'background_type_gradient' => 'Gradiente',
        'start_color' => 'Cor inicial',
        'end_color' => 'Cor final',
        'start_time' => 'Horário de início',
        'start_time_reset' => 'Redefinir horário de início',
        'end_time' => 'Horário de término',
        'end_time_reset' => 'Redefinir horário de término',
    ],
    'badges' => [
        'scheduling_status' => [
            'active' => 'Ativo',
            'scheduled' => 'Agendado',
            'expired' => 'Expirado',
        ],
    ],
    'actions' => [
        'help' => 'Ajuda',
        'reset' => 'Redefinir',
    ],
];

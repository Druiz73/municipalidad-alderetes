<?php
/**
 * Contenido institucional editable.
 *
 * Los textos e imágenes aprobados viven como valores predeterminados en el
 * tema. ACF solo guarda los cambios que haga el personal municipal. Si el
 * plugin se desactiva o un campo queda vacío, el sitio conserva el contenido
 * original.
 *
 * @package TailPress
 */

defined('ABSPATH') || exit;

/**
 * Esquema central de contenido editable por página.
 *
 * @return array<string, array{label:string, fields:array<string, array<string, mixed>>}>
 */
function tp_editable_content_schema(): array
{
    $theme_uri = get_template_directory_uri();

    return [
        'inicio' => [
            'label'  => 'Inicio y datos generales',
            'fields' => [
                'hero_slogan' => ['label' => 'Frase del carrusel', 'default' => 'Para seguir creciendo'],
                'hero_image_1' => ['label' => 'Carrusel — imagen 1', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/CARRUSEL/FOTO1.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_image_2' => ['label' => 'Carrusel — imagen 2', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/CARRUSEL/FOTO2.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_image_3' => ['label' => 'Carrusel — imagen 3', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/CARRUSEL/FOTO3.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_image_4' => ['label' => 'Carrusel — imagen 4', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/CARRUSEL/FOTO12.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_image_5' => ['label' => 'Carrusel — imagen 5', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/OFICINA-EMPLEO/portada.jpeg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'turnos_title' => ['label' => 'Título del aviso de turnos', 'default' => '¡Nuevo sistema de turnos online!'],
                'turnos_text' => ['label' => 'Texto del aviso de turnos', 'default' => 'Sacá tu turno para el carnet de manejo sin salir de casa'],
                'turnos_button' => ['label' => 'Botón del aviso de turnos', 'default' => 'Solicitar turno'],
                'tramites_badge' => ['label' => 'Etiqueta de trámites', 'default' => 'Servicios Online'],
                'tramites_title' => ['label' => 'Título de trámites', 'default' => 'Trámites Municipales'],
                'tramites_text' => ['label' => 'Introducción de trámites', 'type' => 'textarea', 'default' => 'Realizá tus gestiones de forma rápida y sencilla desde cualquier lugar'],
                'tramites_cards' => ['label' => 'Tarjetas de trámites', 'type' => 'textarea', 'default' => "Rentas|Tasas, impuestos y certificaciones\nTránsito|Licencias, renovaciones y turnos\nTribunal de Faltas|Consulta de infracciones y libre deuda\nCatastro|Información catastral y planos", 'instructions' => 'Conservá las cuatro líneas y el formato: Título | Descripción. Los enlaces e íconos están protegidos.'],
                'tramites_card_button' => ['label' => 'Texto de las tarjetas de trámites', 'default' => 'TRÁMITES'],
                'areas_badge' => ['label' => 'Etiqueta de áreas', 'default' => 'Gestión Municipal'],
                'areas_title' => ['label' => 'Título de áreas', 'default' => 'Áreas del Municipio'],
                'areas_text' => ['label' => 'Introducción de áreas', 'type' => 'textarea', 'default' => 'Conocé las diferentes áreas que trabajan para mejorar la calidad de vida de todos los vecinos'],
                'areas_cards' => ['label' => 'Tarjetas de áreas', 'type' => 'textarea', 'default' => "Obras Públicas|Infraestructura y desarrollo urbano\nOficina de Empleo|Oportunidades laborales y capacitación\nEducación|Actividades educativas y culturales\nCultura|Arte, eventos y programas culturales\nDeporte|Espacios deportivos y eventos\nSeguridad|Protección ciudadana\nAlumbrado Público|Mantenimiento e iluminación\nCatastro|Gestión territorial\nPolíticas Sociales|Programas comunitarios e inclusión\nPunto Digital|Tecnología, cursos y trámites digitales", 'instructions' => 'Conservá las diez líneas y el formato: Título | Descripción. Los enlaces e íconos están protegidos.'],
                'news_badge' => ['label' => 'Etiqueta de noticias', 'default' => 'Actualidad'],
                'news_title' => ['label' => 'Título de noticias', 'default' => 'Últimas Noticias'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario de atención'],
                'hours' => ['label' => 'Horario destacado', 'default' => '08:00 a 13:00 hs'],
                'contact_button' => ['label' => 'Botón de contacto', 'default' => 'Contactanos'],
                'footer_site_name' => ['label' => 'Nombre en el pie', 'default' => 'Municipalidad de Alderetes'],
                'footer_subtitle' => ['label' => 'Ubicación bajo el logo', 'default' => 'Tucumán, Argentina'],
                'footer_address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'footer_address' => ['label' => 'Dirección', 'type' => 'textarea', 'default' => "Caseros y Urquiza\nAlderetes, Tucumán", 'instructions' => 'Una línea por renglón.'],
                'footer_hours_label' => ['label' => 'Etiqueta de horario del pie', 'default' => 'Horario'],
                'footer_hours' => ['label' => 'Horario del pie', 'type' => 'textarea', 'default' => "Lunes a viernes\n08:00 a 13:00 hs", 'instructions' => 'Una línea por renglón.'],
                'footer_social_heading' => ['label' => 'Título de redes sociales', 'default' => 'Seguinos'],
                'footer_areas_heading' => ['label' => 'Título de áreas del pie', 'default' => 'Áreas del Municipio'],
                'footer_location_heading' => ['label' => 'Título del mapa', 'default' => 'Ubicación'],
                'footer_copyright' => ['label' => 'Texto legal del pie', 'default' => 'Municipalidad de Alderetes. Todos los derechos reservados.'],
                'footer_privacy' => ['label' => 'Enlace de privacidad', 'default' => 'Políticas de Privacidad'],
                'footer_terms' => ['label' => 'Enlace de términos', 'default' => 'Términos y Condiciones'],
            ],
        ],
        'obras-publicas' => [
            'label'  => 'Obras Públicas',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/OBRAS-PUBLICAS/FOTO6.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => [
                    'label'   => 'Bajada de portada',
                    'default' => 'Infraestructura y desarrollo urbano para mejorar la calidad de vida de los vecinos',
                ],
                'intro_heading' => [
                    'label'   => 'Título de introducción',
                    'default' => 'Acerca del Área',
                ],
                'intro_1' => [
                    'label'   => 'Primer párrafo',
                    'type'    => 'textarea',
                    'default' => 'La Secretaría o Dirección de Obras Públicas de la municipalidad es el área encargada de planificar, construir y mantener la infraestructura de la ciudad para mejorar la calidad de vida de los vecinos.',
                ],
                'intro_2' => [
                    'label'   => 'Segundo párrafo',
                    'type'    => 'textarea',
                    'default' => 'Durante el período 2025, la Municipalidad de Alderetes llevó adelante un programa sostenido de inversión en infraestructura urbana, enmarcado en un <strong>Plan Integral y Estratégico de Obras Públicas</strong>, orientado a mejorar la calidad de vida de los vecinos, fortalecer la conectividad urbana, optimizar el sistema hidráulico y consolidar el desarrollo ordenado de la ciudad.',
                    'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.',
                ],
                'sidebar_heading' => [
                    'label'   => 'Título de la tarjeta lateral',
                    'default' => 'Obras Públicas',
                ],
                'sidebar_items' => [
                    'label'   => 'Funciones principales',
                    'type'    => 'textarea',
                    'default' => "Planificación de infraestructura urbana\nConectividad vial y accesibilidad\nOptimización del sistema hidráulico\nDesarrollo urbano ordenado",
                    'instructions' => 'Una función por línea.',
                ],
                'cta_title' => [
                    'label'   => 'Título del llamado a contacto',
                    'default' => '¿Necesitás comunicarte con el área?',
                ],
                'cta_text' => [
                    'label'   => 'Texto del llamado a contacto',
                    'type'    => 'textarea',
                    'default' => 'Contactá a la Municipalidad de Alderetes para consultas sobre obras en tu barrio.',
                ],
                'cta_button' => [
                    'label'   => 'Texto del botón',
                    'default' => 'Contactar',
                ],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'alumbrado' => [
            'label'  => 'Alumbrado Público',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/ALUMBRADO-PUBLICO/FOTO1.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => [
                    'label'   => 'Bajada de portada',
                    'default' => 'Instalación, mantenimiento y reparación de luminarias en calles, plazas y espacios públicos',
                ],
                'intro_heading' => [
                    'label'   => 'Título de introducción',
                    'default' => 'Acerca del Área',
                ],
                'intro_1' => [
                    'label'   => 'Descripción del área',
                    'type'    => 'textarea',
                    'default' => 'El Alumbrado Público de la Municipalidad de Alderetes es el área encargada de la instalación, mantenimiento y reparación de las luminarias de las calles, plazas y espacios públicos de la ciudad.',
                ],
                'tasks_heading' => [
                    'label'   => 'Título de tareas',
                    'default' => 'Nuestras principales tareas',
                ],
                'tasks' => [
                    'label'   => 'Tareas principales',
                    'type'    => 'textarea',
                    'default' => "Instalación de luminarias en calles, avenidas, plazas y barrios.\nReparación y mantenimiento de lámparas, cables, columnas y tableros eléctricos.\nReemplazo de luminarias dañadas o quemadas.\nColocación de nuevas luces LED para mejorar la iluminación y el ahorro de energía.\nControl del encendido y apagado automático de las luces públicas.\nAtención de reclamos de vecinos por falta de iluminación o fallas en el servicio.",
                    'instructions' => 'Una tarea por línea.',
                ],
                'sidebar_heading' => [
                    'label'   => 'Título de la tarjeta lateral',
                    'default' => 'LED',
                ],
                'sidebar_text' => [
                    'label'   => 'Texto de la tarjeta lateral',
                    'type'    => 'textarea',
                    'default' => 'Estamos renovando progresivamente el parque de luminarias con tecnología <strong>LED</strong>, mejorando la iluminación y reduciendo el consumo energético.',
                    'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.',
                ],
                'claim_heading' => [
                    'label'   => 'Etiqueta de reclamos',
                    'default' => 'Reclamos',
                ],
                'claim_text' => [
                    'label'   => 'Texto de reclamos',
                    'type'    => 'textarea',
                    'default' => 'Podés reportar fallas de iluminación a través de la Municipalidad.',
                ],
                'cta_title' => [
                    'label'   => 'Título del llamado a contacto',
                    'default' => '¿Hay una luminaria sin funcionar en tu barrio?',
                ],
                'cta_text' => [
                    'label'   => 'Texto del llamado a contacto',
                    'type'    => 'textarea',
                    'default' => 'Reportá la falla a la Municipalidad de Alderetes y la solucionamos.',
                ],
                'cta_button' => [
                    'label'   => 'Texto del botón',
                    'default' => 'Reportar falla',
                ],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'cultura' => [
            'label'  => 'Cultura',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/CULTURA/FOTO2.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Apoyo a artistas, instituciones y comunidades para el acceso democrático a la cultura'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Acerca del Área'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'En el área de Cultura se trabaja de manera articulada con artistas, academias, instituciones educativas, centros comunitarios y organizaciones sociales, brindando apoyo económico, logístico y artístico para la concreción de eventos, viajes, celebraciones y programas culturales.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'Estas acciones reflejan el compromiso sostenido de la gestión con la <strong>identidad cultural</strong>, la participación ciudadana y el acceso democrático a la cultura en sus diversas expresiones.', 'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.'],
                'sidebar_heading' => ['label' => 'Título de la tarjeta lateral', 'default' => 'Apoyamos'],
                'sidebar_items' => ['label' => 'Personas e instituciones acompañadas', 'type' => 'textarea', 'default' => "Artistas locales\nAcademias y escuelas de arte\nCentros comunitarios\nEventos y celebraciones\nProgramas culturales barriales", 'instructions' => 'Un elemento por línea.'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Querés participar o consultar?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para sumarte a los programas culturales.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'deporte' => [
            'label'  => 'Deporte',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/DEPORTES/4.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Promovemos la actividad física, deportiva y recreativa como motor de salud, integración e inclusión comunitaria'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Información del Área'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'La Dirección de Deportes es el área encargada de <strong>promover, organizar y fomentar la actividad física, deportiva y recreativa</strong> en la comunidad. Su principal objetivo es contribuir al desarrollo integral de los vecinos, impulsando hábitos saludables y fortaleciendo la inclusión social a través del deporte.', 'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'Entre sus funciones se destacan la planificación de actividades deportivas, la organización de torneos y eventos, el acompañamiento a instituciones y clubes, y la implementación de programas destinados a niños, jóvenes y adultos.'],
                'intro_3' => ['label' => 'Tercer párrafo', 'type' => 'textarea', 'default' => 'Además, busca garantizar el acceso igualitario a espacios y propuestas recreativas en toda la ciudad.'],
                'sidebar_heading' => ['label' => 'Título de la tarjeta lateral', 'default' => 'Funciones principales'],
                'sidebar_items' => ['label' => 'Funciones principales', 'type' => 'textarea', 'default' => "Planificación de actividades deportivas y recreativas\nOrganización de torneos y eventos\nAcompañamiento a instituciones y clubes\nProgramas para niños, jóvenes y adultos\nAcceso igualitario a espacios y propuestas en toda la ciudad", 'instructions' => 'Una función por línea.'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Querés sumarte al deporte municipal?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para conocer los espacios deportivos disponibles.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'educacion' => [
            'label'  => 'Educación',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/EDUCACION/EDUCACION.JPG', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Planificamos y coordinamos políticas educativas para garantizar el acceso al aprendizaje'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Acerca del Área'],
                'intro_1' => ['label' => 'Descripción del área', 'type' => 'textarea', 'default' => 'El trabajo de la Secretaría de Educación consiste en planificar, coordinar y ejecutar las políticas educativas para mejorar la educación y garantizar el acceso al aprendizaje de la población.'],
                'functions' => ['label' => 'Funciones y acciones', 'type' => 'textarea', 'default' => "Diseñar políticas educativas|Crear proyectos y planes para mejorar la educación en la comunidad.|Promover programas educativos para niños, jóvenes y adultos.\nCoordinar con escuelas e instituciones|Trabajar junto a escuelas, docentes, universidades y organizaciones educativas.|Articular acciones con los ministerios de educación provincial o nacional.\nGarantizar el acceso a la educación|Impulsar programas de inclusión educativa.|Promover igualdad de oportunidades para todos los estudiantes.\nSupervisar proyectos educativos|Controlar que los programas, cursos y capacitaciones se desarrollen correctamente.|Evaluar resultados y proponer mejoras en el sistema educativo.\nPromover capacitaciones y formación|Organizar talleres, cursos y capacitaciones para docentes y estudiantes.|Fomentar el uso de tecnología e innovación educativa.", 'instructions' => 'Una tarjeta por línea, con el formato: Título | Primera acción | Segunda acción.'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Necesitás comunicarte con el área?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para consultas sobre programas educativos.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'oficina-empleo' => [
            'label'  => 'Oficina de Empleo',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/OFICINA-EMPLEO/portada.jpeg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Acompañamos a vecinos y vecinas brindando herramientas y oportunidades para mejorar su inserción laboral'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Acerca del Área'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'La <strong>Oficina de Empleo</strong> acompaña a vecinos y vecinas brindando herramientas y oportunidades para mejorar su inserción laboral. Ofrecemos asesoramiento, orientación laboral, capacitación y apoyo en la búsqueda de empleo, fortaleciendo las habilidades y posibilidades de crecimiento de cada persona.', 'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'Trabajamos por más oportunidades para nuestra comunidad, coordinando programas y servicios diseñados para ayudarte a construir un mejor futuro laboral.'],
                'services_heading' => ['label' => 'Título de servicios', 'default' => 'Servicios y programas'],
                'services' => ['label' => 'Servicios y programas', 'type' => 'textarea', 'default' => "Asesoramiento y orientación laboral personalizada.\nCapacitación laboral y talleres para el fortalecimiento de habilidades.\nApoyo y asistencia en la búsqueda activa de empleo.\nVinculación con programas de empleo nacionales y provinciales.\nIntermediación laboral con comercios y empresas locales.", 'instructions' => 'Un servicio por línea.'],
                'sidebar_heading' => ['label' => 'Título de la tarjeta lateral', 'default' => 'Oficina de Empleo'],
                'sidebar_text' => ['label' => 'Texto de la tarjeta lateral', 'type' => 'textarea', 'default' => 'Acercate y conocé los programas y servicios disponibles para ayudarte a construir un mejor futuro laboral.'],
                'hours_label' => ['label' => 'Etiqueta del horario', 'default' => 'Horario de atención'],
                'hours' => ['label' => 'Horario', 'default' => 'Lunes a Viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
                'place_label' => ['label' => 'Etiqueta del lugar', 'default' => 'Lugar'],
                'place' => ['label' => 'Lugar', 'type' => 'textarea', 'default' => 'Benjamin Aráoz 100 entre Caseros y pasaje Junín'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Necesitás comunicarte con el área?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para consultas sobre la Oficina de Empleo.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
            ],
        ],
        'catastro' => [
            'label'  => 'Catastro',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/direccion-catastro.jpeg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Gestión, registro y actualización de la información territorial del municipio.'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => '¿Qué hacemos?'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'El Área de Catastro de la Municipalidad de Alderetes es responsable de la <strong class="text-gray-800">gestión, registro y actualización</strong> de la información territorial del municipio. Esta área mantiene el registro de todas las parcelas, propiedades y modificaciones territoriales dentro del ejido municipal.', 'instructions' => 'El texto entre etiquetas <strong> conserva la negrita.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'Brindamos servicios de <strong class="text-gray-800">consulta catastral, emisión de certificados, aprobación de planos de mensura y subdivisión</strong>, y asesoramiento técnico para trámites relacionados con la propiedad inmueble.', 'instructions' => 'El texto entre etiquetas <strong> conserva la negrita.'],
                'downloads_heading' => ['label' => 'Título de descargas', 'default' => 'Descargas'],
                'download_button' => ['label' => 'Texto de descarga', 'default' => 'Descargar PDF'],
                'attention_heading' => ['label' => 'Título de atención', 'default' => 'Atención'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección', 'default' => 'Edificio Municipal – Caseros y Urquiza'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'contacto' => [
            'label' => 'Contacto',
            'fields' => [
                'hero_badge' => ['label' => 'Etiqueta de portada', 'default' => 'Estamos para ayudarte'],
                'hero_title' => ['label' => 'Título de portada', 'default' => 'Contacto'],
                'hero_text' => ['label' => 'Bajada de portada', 'type' => 'textarea', 'default' => 'Comunicate con nosotros para realizar consultas, sugerencias o cualquier inquietud'],
                'info_heading' => ['label' => 'Título de información', 'default' => 'Información de Contacto'],
                'info_text' => ['label' => 'Introducción de información', 'type' => 'textarea', 'default' => 'Estamos a tu disposición para atender tus consultas y brindarte la mejor atención.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección', 'type' => 'textarea', 'default' => "Caseros y Urquiza\nAlderetes, Tucumán", 'instructions' => 'Una línea por renglón.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario de Atención'],
                'hours' => ['label' => 'Horario', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'form_heading' => ['label' => 'Título del formulario', 'default' => 'Envianos tu consulta'],
                'map_heading' => ['label' => 'Título del mapa', 'default' => 'Ubicación'],
                'map_text' => ['label' => 'Texto del mapa', 'default' => 'Encontranos en el centro de Alderetes'],
            ],
        ],
        'turnos-de-transito' => [
            'label' => 'Turnos de Tránsito',
            'fields' => [
                'hero_badge' => ['label' => 'Etiqueta de portada', 'default' => 'Dirección de Tránsito'],
                'hero_title' => ['label' => 'Título de portada', 'default' => 'Sacar Turno'],
                'hero_text' => ['label' => 'Bajada de portada', 'default' => 'Licencias de conducir · Renovaciones · Duplicados'],
                'hero_hours' => ['label' => 'Horario visible', 'default' => 'Lunes a Viernes · 8:00 a 13:00 hs'],
                'hero_interval' => ['label' => 'Intervalo visible', 'default' => 'Intervalos de 30 minutos'],
            ],
        ],
        'punto-digital' => [
            'label' => 'Punto Digital',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/punto-digital/' . rawurlencode('ACTIVIDADES EN COORDINACION CON LAS ESCUELAS2.jpg'), 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'logo_image' => ['label' => 'Logo de Punto Digital', 'type' => 'image', 'default' => $theme_uri . '/resources/images/punto-digital/' . rawurlencode('LOGO PUNTO DIGITAL.jpg'), 'instructions' => 'Recomendado: imagen cuadrada con buena resolución. Si queda vacía, se conserva el logo actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Tecnología, formación y servicios digitales para acompañar a la comunidad de Alderetes'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Punto Digital Alderetes'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'El Punto Digital de Alderetes es un espacio público destinado a brindar acceso a herramientas tecnológicas y servicios digitales, promoviendo la inclusión y el desarrollo de la comunidad.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'El Punto Digital es un servicio gratuito para la comunidad, que tiene como objetivo garantizar el acceso igualitario a la tecnología, facilitando el uso de computadoras, el asesoramiento en distintos trámites, el uso de una sala de entretenimiento, la proyección de películas en una sala de cine totalmente equipada, entre otras actividades destinadas a los vecinos de Alderetes.'],
                'intro_3' => ['label' => 'Tercer párrafo', 'type' => 'textarea', 'default' => 'A través de este espacio se fortalecen la formación, la recreación y el acompañamiento en gestiones digitales, generando más oportunidades para niños, jóvenes y adultos.'],
                'card_heading' => ['label' => 'Título de tarjeta', 'default' => 'Servicio gratuito para la comunidad'],
                'card_text' => ['label' => 'Texto de tarjeta', 'type' => 'textarea', 'default' => 'Un espacio de acceso tecnológico, formación, recreación y acompañamiento en trámites digitales.'],
                'services_badge' => ['label' => 'Etiqueta de servicios', 'default' => 'Servicios'],
                'services_heading' => ['label' => 'Título de servicios', 'default' => '¿Qué ofrece el Punto Digital?'],
                'services' => ['label' => 'Tarjetas de servicios', 'type' => 'textarea', 'default' => "Cursos y capacitaciones|Formación en informática y otras materias para ampliar conocimientos y habilidades.\nAsistencia en trámites|Acompañamiento para Mi Argentina, ANSES, PROGRESAR, subsidios de servicios públicos y otras gestiones.\nTalleres educativos|Espacios educativos y de formación laboral pensados para distintas edades y necesidades.\nSala de entretenimiento|Uso de consolas de videojuegos y propuestas recreativas para niños y jóvenes.", 'instructions' => 'Conservá las cuatro líneas y el formato: Título | Descripción.'],
                'galleries_badge' => ['label' => 'Etiqueta de galerías', 'default' => 'Galerías'],
                'galleries_heading' => ['label' => 'Título de galerías', 'default' => 'Espacios y actividades del Punto Digital'],
                'galleries_text' => ['label' => 'Texto de galerías', 'type' => 'textarea', 'default' => 'Cada carpeta ahora se muestra como una sección propia para ordenar mejor las fotos y el contenido de cada espacio.'],
                'gallery_link' => ['label' => 'Texto para abrir una galería', 'default' => 'Ver fotos de esta sección'],
                'featured_badge' => ['label' => 'Etiqueta de imágenes generales', 'default' => 'Destacadas'],
                'featured_heading' => ['label' => 'Título de imágenes generales', 'default' => 'Imágenes generales'],
                'cta_title' => ['label' => 'Título de contacto', 'default' => '¿Querés acercarte o recibir asesoramiento?'],
                'cta_text' => ['label' => 'Texto de contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para obtener más información sobre actividades y servicios del Punto Digital.'],
                'cta_address' => ['label' => 'Dirección', 'default' => 'Llegarse por: 9 de Julio 200 - El Corte - Alderetes'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería – Imágenes generales', 'type' => 'gallery', 'instructions' => 'Fotos destacadas sueltas del Punto Digital. Podés eliminar, reordenar o agregar nuevas. Si la dejás vacía, se usan 3 fotos del tema.'],
                'gallery_aprendizaje' => ['label' => 'Galería – Sala de Aprendizaje', 'type' => 'gallery', 'instructions' => 'Fotos de la Sala de Aprendizaje (8). Si la dejás vacía, se muestran las del tema.'],
                'gallery_cine' => ['label' => 'Galería – Sala de Cine', 'type' => 'gallery', 'instructions' => 'Fotos de la Sala de Cine (4). Si la dejás vacía, se muestran las del tema.'],
                'gallery_entretenimiento' => ['label' => 'Galería – Sala de Entretenimiento', 'type' => 'gallery', 'instructions' => 'Fotos de la Sala de Entretenimiento (4). Si la dejás vacía, se muestran las del tema.'],
                'gallery_tramites' => ['label' => 'Galería – Trámites', 'type' => 'gallery', 'instructions' => 'Fotos de Trámites (5). Si la dejás vacía, se muestran las del tema.'],
            ],
        ],
        'rentas' => [
            'label' => 'Rentas',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/direccion-rentas.jpeg', 'instructions' => 'Esta portada se comparte entre Rentas, TEM, CISI y Cementerio. Recomendado: foto horizontal de al menos 1600 × 900 px.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Gestión de tributos municipales, requisitos y beneficios.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horarios de Atención:'],
                'hours' => ['label' => 'Horario', 'default' => 'Lunes a Viernes · 8:00 a 13:30 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
                'notice_heading' => ['label' => 'Título del aviso', 'default' => 'Nota Importante'],
                'notice_text' => ['label' => 'Texto del aviso', 'default' => '"LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"'],
                'tem_signup_heading' => ['label' => 'TEM — título de inscripción', 'default' => 'Requisitos para Inscripción T.E.M.'],
                'tem_signup_items' => ['label' => 'TEM — requisitos de inscripción', 'type' => 'textarea', 'default' => "Fotocopia de DNI.\nConstancia de CUIL.\nFotocopia boleta de servicios (particular y local comercial).\nOriginal y fotocopia de contrato de locación (si fuese locatorio).\nOriginal y fotocopia de contrato social (si fuese persona jurídica).\nConstancia de inscripción en A.F.I.P. y D.G.R. (si está inscripto).\nArancel Administrativo.", 'instructions' => 'Un requisito por línea.'],
                'tem_exemption_heading' => ['label' => 'TEM — título de exención', 'default' => 'Requisitos para Exención T.E.M.'],
                'tem_exemption_items' => ['label' => 'TEM — requisitos de exención', 'type' => 'textarea', 'default' => "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, solicitando exención y explicando motivo.\nFotocopia de DNI.\nCarnet de Discapacidad actualizado (si corresponde).\nFotocopia última boleta de sueldo (si corresponde).\nBoleta de un servicio.\nConstancia de CUIL.\nArancel administrativo.", 'instructions' => 'Un requisito por línea.'],
                'tem_downloads_heading' => ['label' => 'TEM — título de descargas', 'default' => 'Descargas T.E.M.'],
                'cisi_transfer_heading' => ['label' => 'CISI — título de cambio de titularidad', 'default' => 'Cambio de Titularidad C.I.S.I.'],
                'cisi_transfer_items' => ['label' => 'CISI — requisitos de cambio de titularidad', 'type' => 'textarea', 'default' => "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón de la propiedad.\nOriginal y fotocopia de la Escritura.\nInforme del Registro Inmobiliario – Av. Salta N.º 19 S.M. de Tucumán.\nFotocopia DNI del titular del inmueble.\nArancel administrativo.", 'instructions' => 'Un requisito por línea.'],
                'cisi_exemption_heading' => ['label' => 'CISI — título de exención', 'default' => 'Requisitos para Exención C.I.S.I.'],
                'cisi_exemption_items' => ['label' => 'CISI — requisitos de exención', 'type' => 'textarea', 'default' => "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón de la propiedad.\nFotocopia de DNI.\nOriginal y fotocopia de la Escritura.\nFotocopia última boleta de sueldo.\nInforme del Registro Inmobiliario – Av. Salta N.º 19 S.M. de Tucumán.", 'instructions' => 'Un requisito por línea.'],
                'cisi_fee' => ['label' => 'CISI — arancel administrativo', 'default' => 'Arancel Administrativo: $2.000'],
                'cemetery_transfer_heading' => ['label' => 'Cementerio — título de cambio de titularidad', 'default' => 'Cambio de Titularidad C.I.S.C.'],
                'cemetery_transfer_items' => ['label' => 'Cementerio — requisitos de cambio de titularidad', 'type' => 'textarea', 'default' => "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, por duplicado con certificación de firma de autoridad policial.\nFotocopia de Acta de Defunción del Titular.\nActa de Nacimiento del nuevo titular y/o acta de matrimonio.\nFotocopia de DNI del nuevo titular.\nArancel administrativo.", 'instructions' => 'Un requisito por línea.'],
                'cemetery_exemption_heading' => ['label' => 'Cementerio — título de exención', 'default' => 'Exención C.I.S.C. (Cementerio)'],
                'cemetery_exemption_items' => ['label' => 'Cementerio — requisitos de exención', 'type' => 'textarea', 'default' => "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón.\nFotocopia de DNI.\nOriginal y fotocopia de la Escritura.\nFotocopia última boleta de sueldo.\nArancel Administrativo.", 'instructions' => 'Un requisito por línea.'],
                'cemetery_burial_heading' => ['label' => 'Cementerio — título de inhumación', 'default' => 'Inhumación C.I.S.C. (Cementerio)'],
                'cemetery_burial_items' => ['label' => 'Cementerio — requisitos de inhumación', 'type' => 'textarea', 'default' => "Fotocopia de DNI de la persona que hace el trámite.\nEstar al día con el impuesto.\nLa persona que realice el trámite tiene que ser el titular.\nSi el titular falleció, debe hacer cambio de titularidad.\nCertificado de Defunción.", 'instructions' => 'Un requisito por línea.'],
                'rentas_aviso1_titulo' => ['label' => 'Aviso 1: Título', 'default' => 'Nota Importante'],
                'rentas_aviso1_subtitulo' => ['label' => 'Aviso 1: Subtítulo (Opcional)', 'default' => ''],
                'rentas_aviso1_texto' => ['label' => 'Aviso 1: Texto/Párrafo', 'type' => 'textarea', 'default' => '"LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"'],
                'rentas_aviso1_imagen' => ['label' => 'Aviso 1: Imagen (Opcional)', 'type' => 'image', 'default' => ''],
                
                'rentas_aviso2_titulo' => ['label' => 'Aviso 2: Título', 'default' => ''],
                'rentas_aviso2_subtitulo' => ['label' => 'Aviso 2: Subtítulo (Opcional)', 'default' => ''],
                'rentas_aviso2_texto' => ['label' => 'Aviso 2: Texto/Párrafo', 'type' => 'textarea', 'default' => ''],
                'rentas_aviso2_imagen' => ['label' => 'Aviso 2: Imagen (Opcional)', 'type' => 'image', 'default' => ''],
                
                'rentas_aviso3_titulo' => ['label' => 'Aviso 3: Título', 'default' => ''],
                'rentas_aviso3_subtitulo' => ['label' => 'Aviso 3: Subtítulo (Opcional)', 'default' => ''],
                'rentas_aviso3_texto' => ['label' => 'Aviso 3: Texto/Párrafo', 'type' => 'textarea', 'default' => ''],
                'rentas_aviso3_imagen' => ['label' => 'Aviso 3: Imagen (Opcional)', 'type' => 'image', 'default' => ''],

                'rentas_descarga1_nombre' => ['label' => 'TEM — Descarga 1: Nombre', 'default' => 'Formulario R708 - Inscripción'],
                'rentas_descarga1_archivo' => ['label' => 'TEM — Descarga 1: Archivo PDF', 'type' => 'file', 'default' => '/wp-content/uploads/2026/03/FORM-INSCRIPCION-TEM.pdf'],
                
                'rentas_descarga2_nombre' => ['label' => 'TEM — Descarga 2: Nombre', 'default' => 'Declaración Jurada'],
                'rentas_descarga2_archivo' => ['label' => 'TEM — Descarga 2: Archivo PDF', 'type' => 'file', 'default' => '/wp-content/uploads/2026/03/FORMULARIO-DDJJ-TEM.pdf'],
                
                'rentas_descarga3_nombre' => ['label' => 'TEM — Descarga 3: Nombre', 'default' => 'Calendario de Vencimientos'],
                'rentas_descarga3_archivo' => ['label' => 'TEM — Descarga 3: Archivo PDF', 'type' => 'file', 'default' => '/wp-content/uploads/2026/05/calendario-vencimiento-2026.pdf'],
                
                'rentas_descarga4_nombre' => ['label' => 'TEM — Descarga 4: Nombre', 'default' => ''],
                'rentas_descarga4_archivo' => ['label' => 'TEM — Descarga 4: Archivo PDF', 'type' => 'file', 'default' => ''],
            ],
        ],
        'transito' => [
            'label' => 'Tránsito',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/direccion-transito.jpeg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Requisitos para licencias de conducir: renovaciones, ampliaciones y permisos.'],
                'courses_heading' => ['label' => 'Título de cursos', 'default' => 'Cursos de Seguridad Vial'],
                'courses_text' => ['label' => 'Texto de cursos', 'type' => 'textarea', 'default' => 'Los cursos obligatorios se realizan de forma online en la plataforma oficial del gobierno nacional.'],
            ],
        ],
        'tribunal-de-faltas' => [
            'label' => 'Tribunal de Faltas',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/tribunal-faltas.jpeg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Juzgamiento de contravenciones, multas de tránsito y normas de convivencia'],
                'query_badge' => ['label' => 'Etiqueta de consulta', 'default' => 'Consulta Gratuita'],
                'query_heading' => ['label' => 'Título de consulta', 'default' => 'Libre Deuda Vehicular'],
                'query_text' => ['label' => 'Texto de consulta', 'type' => 'textarea', 'default' => 'Ingresá la patente de tu vehículo para verificar si tenés infracciones pendientes'],
                'query_button' => ['label' => 'Botón de consulta', 'default' => 'Consultar'],
                'intro_badge' => ['label' => 'Etiqueta institucional', 'default' => 'Organismo Municipal'],
                'intro_heading' => ['label' => 'Título institucional', 'default' => '¿Qué es el Tribunal de Faltas?'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'El Tribunal de Faltas de la Municipalidad de Alderetes es el organismo encargado de resolver multas y actas de contravención dentro de la jurisdicción del municipio.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'Gestiona infracciones municipales, de tránsito y de convivencia, garantizando el cumplimiento de las ordenanzas municipales y el orden urbano de la ciudad.'],
                'intro_3' => ['label' => 'Tercer párrafo', 'type' => 'textarea', 'default' => 'Para realizar trámites se recomienda presentarse con <strong>DNI</strong>, <strong>licencia de conducir</strong> y <strong>tarjeta verde del vehículo</strong>.', 'instructions' => 'El texto entre etiquetas <strong> conserva la negrita.'],
                'functions_heading' => ['label' => 'Título de funciones', 'default' => 'Funciones principales'],
                'functions' => ['label' => 'Funciones', 'type' => 'textarea', 'default' => "Juzgamiento de contravenciones municipales\nResolución de multas de tránsito\nGestión de normas de convivencia\nAtención de actas de infracción\nTramitación de apelaciones y descargos", 'instructions' => 'Una función por línea.'],
                'documents_heading' => ['label' => 'Título de documentación', 'default' => 'Documentación requerida'],
                'documents_text' => ['label' => 'Introducción de documentación', 'default' => 'Para realizar cualquier trámite, presentarse con:'],
                'documents' => ['label' => 'Documentación', 'type' => 'textarea', 'default' => "DNI (Documento Nacional de Identidad)\nLicencia de conducir vigente\nTarjeta verde del vehículo", 'instructions' => 'Un documento por línea.'],
                'attention_heading' => ['label' => 'Título de atención', 'default' => 'Información de atención'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección', 'type' => 'textarea', 'default' => "Rivadavia 1000\nAlderetes, Tucumán", 'instructions' => 'Una línea por renglón.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours_heading' => ['label' => 'Título de horario', 'default' => 'Atención'],
                'hours' => ['label' => 'Horario', 'default' => 'de 08:00 a 13:00 hs.'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
                'map_button' => ['label' => 'Botón del mapa', 'default' => 'Ver en Google Maps'],
                'pending_note' => ['label' => 'Aviso provisorio', 'type' => 'textarea', 'default' => 'Próximamente se habilitará información adicional sobre trámites online y consulta de deuda.'],
                'cta_title' => ['label' => 'Título de contacto', 'default' => '¿Tenés alguna consulta?'],
                'cta_text' => ['label' => 'Texto de contacto', 'type' => 'textarea', 'default' => 'Contactate con el municipio y te responderemos a la brevedad.'],
                'cta_button' => ['label' => 'Botón de contacto', 'default' => 'Contactar al municipio'],
            ],
        ],
        'seguridad' => [
            'label'  => 'Seguridad',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/SEGURIDAD/SEGURIDAD2.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Secretaría de Protección Ciudadana — Policía Local de Alderetes al servicio de la comunidad'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Secretaría de Protección Ciudadana'],
                'intro_1' => ['label' => 'Descripción del área', 'type' => 'textarea', 'default' => 'En la Secretaría de Protección Ciudadana se encuentra la <strong>Policía Local de Alderetes (P.L.A.)</strong>, una fuerza que depende del municipio de Alderetes y que realiza tareas de prevención, patrullaje urbano y apoyo a operativos de seguridad.', 'instructions' => 'Se admite negrita mediante las etiquetas <strong>texto</strong>.'],
                'achievements_heading' => ['label' => 'Título de logros', 'default' => 'Logros 2025'],
                'achievements' => ['label' => 'Logros', 'type' => 'textarea', 'default' => "Nuevo Destacamento en la Costanera|En 2025 se inauguró un destacamento de la Policía Local en la costanera del río Salí, con nuevos efectivos y vehículos para reforzar la seguridad.\nPatrullaje con motos, bicicletas y camionetas|La fuerza cuenta con motos, bicicletas y camionetas para patrullajes en toda la ciudad.\nCustodia de establecimientos estratégicos|Se reforzó la custodia y preservación de establecimientos escolares, edificios públicos y locales comerciales de la ciudad.", 'instructions' => 'Un logro por línea, con el formato: Título | Descripción.'],
                'sidebar_heading' => ['label' => 'Título de la tarjeta lateral', 'default' => 'P.L.A.'],
                'sidebar_text' => ['label' => 'Texto de la tarjeta lateral', 'type' => 'textarea', 'default' => 'La Policía Local de Alderetes es una fuerza municipal que garantiza la seguridad y convivencia de todos los vecinos.'],
                'sidebar_items' => ['label' => 'Funciones principales', 'type' => 'textarea', 'default' => "Prevención del delito\nPatrullaje urbano\nApoyo a operativos\nProtección ciudadana", 'instructions' => 'Una función por línea.'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Necesitás comunicarte con el área?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Municipalidad de Alderetes para consultas sobre seguridad ciudadana.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'politicas-sociales' => [
            'label'  => 'Políticas Sociales',
            'fields' => [
                'hero_image' => ['label' => 'Imagen de portada', 'type' => 'image', 'default' => $theme_uri . '/resources/images/fotos-areas/POLITICAS-SOCIALES/3.jpg', 'instructions' => 'Recomendado: foto horizontal de al menos 1600 × 900 px. Si queda vacía, se conserva la imagen actual.'],
                'hero_tagline' => ['label' => 'Bajada de portada', 'default' => 'Promovemos la inclusión, la igualdad de oportunidades y el bienestar de toda la comunidad'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Acerca del Área'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'La Secretaría de Políticas Sociales de la Municipalidad de Alderetes trabaja para promover la inclusión, la igualdad de oportunidades y el bienestar de todos los vecinos de la ciudad.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'A través de distintos programas y acciones, se brinda acompañamiento a familias en situación de vulnerabilidad, fortaleciendo el acceso a derechos fundamentales como la alimentación, la educación, la salud y el trabajo.'],
                'intro_3' => ['label' => 'Tercer párrafo', 'type' => 'textarea', 'default' => 'Asimismo, se articulan esfuerzos con organismos provinciales y nacionales para ampliar el alcance de las políticas públicas y mejorar la calidad de vida de la comunidad.'],
                'axes' => ['label' => 'Ejes de acción', 'type' => 'textarea', 'default' => "Asistencia Social|Acompañamiento a familias en situación de vulnerabilidad y acceso a derechos fundamentales.\nNiñez y Adolescencia|Programas específicos de apoyo a niños, niñas y adolescentes de la ciudad.\nCapacitación Laboral|Programas de formación y capacitación laboral para vecinos en búsqueda de empleo.\nPolíticas de Género|Acciones orientadas a la igualdad de género y la protección de derechos.\nInclusión Comunitaria|Iniciativas de inclusión social y articulación con organismos provinciales y nacionales.", 'instructions' => 'Un eje por línea, con el formato: Título | Descripción.'],
                'quote' => ['label' => 'Mensaje institucional', 'type' => 'textarea', 'default' => 'El compromiso de la Municipalidad es continuar impulsando políticas sociales que promuevan una sociedad más justa, solidaria e inclusiva para todos los vecinos de Alderetes.'],
                'cta_title' => ['label' => 'Título del llamado a contacto', 'default' => '¿Necesitás asistencia o información?'],
                'cta_text' => ['label' => 'Texto del llamado a contacto', 'type' => 'textarea', 'default' => 'Contactá a la Secretaría de Políticas Sociales de la Municipalidad de Alderetes.'],
                'cta_button' => ['label' => 'Texto del botón', 'default' => 'Contactar'],
                'gallery' => ['label' => 'Galería de imágenes', 'type' => 'gallery', 'instructions' => 'Las fotos actuales ya están precargadas aquí. Podés eliminar, reordenar arrastrando o agregar nuevas. Si dejás la galería vacía, el front mostrará el fallback del tema.'],
                'address_label' => ['label' => 'Etiqueta de dirección', 'default' => 'Dirección'],
                'address' => ['label' => 'Dirección del área', 'type' => 'textarea', 'default' => 'Caseros y Urquiza - Alderetes, Tucumán', 'instructions' => 'Una línea por renglón. Se muestra en la tarjeta lateral del área.'],
                'hours_label' => ['label' => 'Etiqueta de horario', 'default' => 'Horario'],
                'hours' => ['label' => 'Horario del área', 'default' => 'Lunes a viernes de 08:00 a 13:00 hs'],
                'map_url' => ['label' => 'Enlace a Google Maps (opcional)', 'default' => '', 'instructions' => 'Pegá el link de Google Maps. Si está cargado, se muestra botón Ver en mapa.'],
                'map_embed' => ['label' => 'Mapa embebido (opcional, iframe)', 'type' => 'textarea', 'default' => '', 'instructions' => 'Opcional. Pegá el iframe de Google Maps <iframe>. Si está cargado, se muestra el mapa debajo de dirección/horario.'], 
            ],
        ],
        'institucional' => [
            'label'  => 'Institucional',
            'fields' => [
                'hero_title' => ['label' => 'Título de portada', 'default' => 'Institucional'],
                'intro_heading' => ['label' => 'Título de introducción', 'default' => 'Institucional'],
                'intro_1' => ['label' => 'Primer párrafo', 'type' => 'textarea', 'default' => 'La Municipalidad de Alderetes trabaja día a día para mejorar la calidad de vida de sus ciudadanos, gestionando recursos y servicios con transparencia y compromiso social.'],
                'mission_heading' => ['label' => 'Título de misión', 'default' => 'Nuestra Misión'],
                'mission_text' => ['label' => 'Misión', 'type' => 'textarea', 'default' => 'Brindar servicios públicos de excelencia, fomentando el desarrollo sostenible, la inclusión social y el crecimiento económico de nuestra comunidad.'],
                'intro_2' => ['label' => 'Segundo párrafo', 'type' => 'textarea', 'default' => 'A través de nuestras diversas áreas y secretarías, coordinamos acciones que abarcan desde obras públicas y empleo hasta cultura y seguridad, siempre con el vecino como prioridad fundamental.'],
                'history_badge' => ['label' => 'Etiqueta de historia', 'default' => 'Nuestras raíces'],
                'history_heading' => ['label' => 'Título de historia', 'default' => 'Historia de Alderetes'],
                'history_intro' => ['label' => 'Introducción de historia', 'type' => 'textarea', 'default' => 'Ubicada en el departamento Cruz Alta, a solo 7 kilómetros de San Miguel de Tucumán, Alderetes es una de las ciudades más jóvenes y vibrantes de la provincia.'],
                'timeline' => ['label' => 'Hitos históricos', 'type' => 'textarea', 'default' => "Fines del Siglo XVIII|La Posta Colonial|La historia de Alderetes se remonta a fines del siglo XVIII, cuando funcionaba como una <strong>posta en el antiguo camino al norte</strong> durante la etapa colonial, en una zona estratégica cercana al río Salí.\nMediados del Siglo XIX|Reconocimiento como Villa de Alderetes|El poblado creció lentamente como un pequeño caserío rural hasta ser reconocido como villa, contando ya con <strong>escuela y juzgado de paz</strong>, hitos fundamentales de organización civil.\nComienzos del Siglo XX|Auge Agrícola e Inmigración|Su desarrollo estuvo vinculado a la <strong>expansión agrícola y azucarera</strong> de Tucumán. La llegada de inmigrantes aportó diversidad cultural y dinamismo comercial, enriqueciendo la identidad local.\nSegunda Mitad del Siglo XX|Conurbanización y Crecimiento Urbano|El crecimiento urbano de la capital provincial impulsó un proceso de <strong>conurbanización</strong> que transformó a Alderetes en una ciudad integrada al Gran San Miguel de Tucumán.\nMediados de la Década de 1980|Categoría de Municipio|Con el retorno de la democracia, Alderetes obtuvo su <strong>categoría de municipio</strong>, consolidando su autonomía y capacidad de gestión para el bienestar de sus habitantes.\nHoy|Una Ciudad en Crecimiento|Alderetes combina su <strong>identidad histórica</strong> con un sostenido crecimiento demográfico y urbano, siendo una comunidad que refleja los procesos sociales, económicos y culturales característicos del este tucumano.", 'instructions' => 'Un hito por línea, con el formato: Período | Título | Descripción. Se admite <strong>negrita</strong>.'],
                'location_label' => ['label' => 'Etiqueta de ubicación', 'default' => 'Ubicación'],
                'location_heading' => ['label' => 'Título de ubicación', 'default' => 'Departamento Cruz Alta'],
                'location_text' => ['label' => 'Texto de ubicación', 'type' => 'textarea', 'default' => 'A solo <span class="text-white font-bold text-xl">7 km</span> de San Miguel de Tucumán, en el corazón del este tucumano.', 'instructions' => 'El texto entre etiquetas <span> conserva el destaque visual de la distancia.'],
            ],
        ],
        'organigrama' => [
            'label'  => 'Organigrama Municipal',
            'fields' => [
                'hero_period' => ['label' => 'Período de gestión', 'default' => 'Período 2023 – 2027'],
                'hero_title' => ['label' => 'Título de portada', 'default' => 'Organigrama Municipal'],
                'hero_text' => ['label' => 'Descripción de portada', 'type' => 'textarea', 'default' => 'Estructura de gobierno de la Municipalidad de Alderetes bajo la gestión de la Intendenta Graciela Gutiérrez.'],
                'executive_label' => ['label' => 'Etiqueta del Poder Ejecutivo', 'default' => 'Poder Ejecutivo'],
                'mayor_role' => ['label' => 'Cargo de la intendenta', 'default' => 'Intendenta'],
                'mayor_name' => ['label' => 'Nombre de la intendenta', 'default' => 'Graciela Gutiérrez'],
                'mayor_period' => ['label' => 'Período de la intendenta', 'default' => 'Período 2023 – 2027'],
                'mayor_photo' => ['label' => 'Foto de la intendenta', 'type' => 'image', 'default' => '', 'instructions' => 'Podés dejarla vacía hasta recibir la fotografía oficial.'],
                'legislative_label' => ['label' => 'Etiqueta del Poder Legislativo', 'default' => 'Poder Legislativo Local'],
                'legislative_title' => ['label' => 'Título del Concejo Deliberante', 'default' => 'Honorable Concejo Deliberante'],
                'legislative_text' => ['label' => 'Descripción del Concejo Deliberante', 'type' => 'textarea', 'default' => 'El HCD es el órgano legislativo del Municipio, encargado de representar a la comunidad y de dictar las normas que regulan la vida local.'],
                'update_note' => ['label' => 'Nota de actualización', 'type' => 'textarea', 'default' => '* La información del organigrama se actualiza conforme a los cambios oficiales en la estructura municipal.'],
            ],
        ],
    ];
}

/**
 * Convierte una URL predeterminada del tema en una ruta local segura.
 *
 * @return array{path:string, relative:string}|null
 */
function tp_editable_theme_image_source(string $url): ?array
{
    if ($url === '') {
        return null;
    }

    $theme_url = rawurldecode(untrailingslashit(get_template_directory_uri())) . '/';
    $decoded_url = rawurldecode($url);

    if (strpos($decoded_url, $theme_url) !== 0) {
        return null;
    }

    $relative = ltrim(substr($decoded_url, strlen($theme_url)), '/');
    $theme_path = realpath(get_template_directory());
    $source_path = realpath(trailingslashit(get_template_directory()) . $relative);

    if (!$theme_path || !$source_path || !is_file($source_path)) {
        return null;
    }

    $allowed_prefix = trailingslashit($theme_path);
    if (strpos($source_path, $allowed_prefix) !== 0) {
        return null;
    }

    return [
        'path'     => $source_path,
        'relative' => str_replace('\\', '/', $relative),
    ];
}

/**
 * Mapa de galerías por área — rutas relativas dentro del tema.
 * Se usa para precargar la galería en la mediateca la primera vez,
 * de modo que el admin vea las fotos actuales y pueda editar/eliminar.
 *
 * @return array<string, string[]>
 */
function tp_gallery_fallback_map(): array {
    return [
        'obras-publicas'      => ['resources/images/fotos-areas/OBRAS-PUBLICAS/FOTO4.jpg','resources/images/fotos-areas/OBRAS-PUBLICAS/FOTO5.jpg','resources/images/fotos-areas/OBRAS-PUBLICAS/FOTO6.jpg','resources/images/fotos-areas/OBRAS-PUBLICAS/FOTO10.JPG'],
        'alumbrado'           => ['resources/images/fotos-areas/ALUMBRADO-PUBLICO/FOTO2.jpg','resources/images/fotos-areas/ALUMBRADO-PUBLICO/FOTO3.jpg','resources/images/fotos-areas/ALUMBRADO-PUBLICO/FOTO4.jpg'],
        'cultura'             => ['resources/images/fotos-areas/CULTURA/FOTO3.jpg'],
        'deporte'             => ['resources/images/fotos-areas/DEPORTES/1.jpg','resources/images/fotos-areas/DEPORTES/2.jpg','resources/images/fotos-areas/DEPORTES/3.jpg','resources/images/fotos-areas/DEPORTES/5.jpg','resources/images/fotos-areas/DEPORTES/6.jpg','resources/images/fotos-areas/DEPORTES/7.jpg','resources/images/fotos-areas/DEPORTES/8.jpg','resources/images/fotos-areas/DEPORTES/9.jpg'],
        'educacion'           => ['resources/images/fotos-areas/EDUCACION/FOTO5.jpg','resources/images/fotos-areas/EDUCACION/FOTO6.jpg'],
        'oficina-empleo'      => ['resources/images/fotos-areas/OFICINA-EMPLEO/1.jpeg','resources/images/fotos-areas/OFICINA-EMPLEO/2.jpeg','resources/images/fotos-areas/OFICINA-EMPLEO/3.jpeg'],
        'seguridad'           => ['resources/images/fotos-areas/SEGURIDAD/SEGURIDAD1.JPG','resources/images/fotos-areas/SEGURIDAD/SEGURIDAD3.JPG','resources/images/fotos-areas/SEGURIDAD/SEGURIDAD4.JPG','resources/images/fotos-areas/SEGURIDAD/SEGURIDAD5.jpg'],
        'politicas-sociales'  => ['resources/images/fotos-areas/POLITICAS-SOCIALES/1.jpg','resources/images/fotos-areas/POLITICAS-SOCIALES/2.jpg','resources/images/fotos-areas/POLITICAS-SOCIALES/3.jpg','resources/images/fotos-areas/POLITICAS-SOCIALES/4.jpg','resources/images/fotos-areas/POLITICAS-SOCIALES/5.jpg'],
        'punto-digital'       => ['resources/images/punto-digital/ACTIVIDADES EN COORDINACION CON LAS ESCUELAS1.jpg','resources/images/punto-digital/CERTIFICACION1.jpg','resources/images/punto-digital/TORNEOS.jpg'],
    ];
}

/**
 * Precarga las galerías de cada área si el campo está vacío.
 * Importa cada foto del fallback a la mediateca y las asigna al campo gallery.
 *
 * @return array{imported:int, assigned:int, skipped:int, errors:string[]}
 */
function tp_editable_preload_galleries(bool $force = false): array {
    $result = ['imported'=>0,'assigned'=>0,'skipped'=>0,'errors'=>[]];
    $map = tp_gallery_fallback_map();
    foreach ($map as $slug => $rel_paths) {
        if (empty($rel_paths)) continue;
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page) { $result['errors'][] = $slug.': página no existe (creala en Páginas o revisa el slug)'; continue; }
        
        $assigned_count = 0;
        $skipped_count = 0;
        
        foreach ($rel_paths as $index => $rel) {
            $num = $index + 1;
            $field_name = 'gallery_' . $num;
            $field_key = 'field_tp_' . md5($slug . ':' . $field_name);
            
            // Si ya tiene algo cargado en este campo, no tocar (a menos que $force)
            if (!$force && metadata_exists('post', $page->ID, '_' . $field_name)) {
                $skipped_count++;
                continue;
            }
            
            $abs = trailingslashit(get_template_directory()) . $rel;
            if (!is_file($abs)) { $result['errors'][] = $slug.': no existe '.$rel; continue; }
            $source = ['path'=>$abs, 'relative'=>$rel];
            $att_id = tp_editable_import_theme_image($source, 'Galería - '.$slug.' (Foto '.$num.')');
            if (is_wp_error($att_id)) { $result['errors'][] = $slug.': '.$att_id->get_error_message(); continue; }
            
            update_post_meta($page->ID, $field_name, $att_id);
            update_post_meta($page->ID, '_' . $field_name, $field_key);
            if (function_exists('update_field')) {
                update_field($field_key, $att_id, $page->ID);
            }
            
            $saved = get_post_meta($page->ID, $field_name, true);
            if (!empty($saved)) {
                $assigned_count++;
                $result['imported']++;
            } else {
                $result['errors'][] = $slug.': no se pudo asignar ' . $field_name;
            }
        }
        
        if ($assigned_count > 0) {
            $result['assigned']++;
        }
        if ($skipped_count === count($rel_paths)) {
            $result['skipped']++;
        }
    }
    return $result;
}

/**
 * Importa una imagen del tema a la Biblioteca de medios o reutiliza la copia
 * creada en una ejecución anterior.
 *
 * @param array{path:string, relative:string} $source
 * @return int|WP_Error
 */
function tp_editable_import_theme_image(array $source, string $label)
{
    $existing_ids = get_posts([
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_key'       => '_tp_theme_image_source',
        'meta_value'     => $source['relative'],
        'no_found_rows'  => true,
    ]);

    if ($existing_ids) {
        $existing_id = (int) $existing_ids[0];
        $existing_file = get_attached_file($existing_id);
        if ($existing_file && is_file($existing_file)) {
            return $existing_id;
        }
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $upload = wp_upload_dir();
    if (!empty($upload['error'])) {
        return new WP_Error('tp_upload_error', (string) $upload['error']);
    }

    if (!wp_mkdir_p($upload['path'])) {
        return new WP_Error('tp_upload_directory', 'No se pudo preparar la carpeta de medios.');
    }

    $filename = sanitize_file_name(wp_basename($source['path']));
    $filename = wp_unique_filename($upload['path'], $filename);
    $destination = trailingslashit($upload['path']) . $filename;

    if (!copy($source['path'], $destination)) {
        return new WP_Error('tp_upload_copy', 'No se pudo copiar la imagen a la Biblioteca de medios.');
    }

    $filetype = wp_check_filetype($filename, null);
    if (empty($filetype['type']) || strpos((string) $filetype['type'], 'image/') !== 0) {
        wp_delete_file($destination);
        return new WP_Error('tp_upload_type', 'El archivo no es una imagen compatible.');
    }

    $attachment_id = wp_insert_attachment([
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_text_field(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $destination, 0, true);

    if (is_wp_error($attachment_id)) {
        wp_delete_file($destination);
        return $attachment_id;
    }

    update_post_meta($attachment_id, '_tp_theme_image_source', $source['relative']);
    update_post_meta($attachment_id, '_wp_attachment_image_alt', sanitize_text_field($label));

    $metadata = wp_generate_attachment_metadata($attachment_id, $destination);
    if (is_array($metadata)) {
        wp_update_attachment_metadata($attachment_id, $metadata);
    }

    return (int) $attachment_id;
}

/**
 * Precarga las imágenes aprobadas en ACF sin reemplazar selecciones existentes.
 *
 * La función es repetible: una misma imagen del tema se importa una sola vez y
 * cada campo que ya tenga contenido queda intacto.
 *
 * @return array{imported:int, assigned:int, skipped:int, errors:string[]}
 */
function tp_editable_preload_images(): array
{
    $result = [
        'imported' => 0,
        'assigned' => 0,
        'skipped'  => 0,
        'errors'   => [],
    ];

    foreach (tp_editable_content_schema() as $slug => $page_schema) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page) {
            // Si la página aún no existe (instalaciones previas), la creamos al vuelo para que la sección Galería aparezca sin esperar al siguiente init
            $titles = [
                'obras-publicas' => 'Obras Públicas',
                'oficina-empleo' => 'Oficina de Empleo',
                'cultura' => 'Cultura',
                'deporte' => 'Deporte',
                'educacion' => 'Educación',
                'seguridad' => 'Seguridad',
                'alumbrado' => 'Alumbrado Público',
                'politicas-sociales' => 'Políticas Sociales',
                'punto-digital' => 'Punto Digital',
                'tribunal-de-faltas' => 'Tribunal de Faltas',
                'catastro' => 'Catastro',
                'transito' => 'Tránsito',
                'rentas' => 'Rentas',
            ];
            $title = $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug));
            $new_id = wp_insert_post([
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ], true);
            if (is_wp_error($new_id) || !$new_id) {
                continue;
            }
            // Asignar plantilla si existe en el mapa de áreas
            $tmpl_map = [
                'obras-publicas' => 'page-obras-publicas.php',
                'cultura' => 'page-cultura.php',
                'deporte' => 'page-deporte.php',
                'educacion' => 'page-educacion.php',
                'seguridad' => 'page-seguridad.php',
                'alumbrado' => 'page-alumbrado.php',
                'politicas-sociales' => 'page-politicas-sociales.php',
                'oficina-empleo' => 'page-oficina-empleo.php',
            ];
            if (isset($tmpl_map[$slug])) {
                update_post_meta($new_id, '_wp_page_template', $tmpl_map[$slug]);
            }
            $page = get_post($new_id);
            if (!$page) continue;
        }

        foreach ($page_schema['fields'] as $name => $settings) {
            if (($settings['type'] ?? '') !== 'image' || empty($settings['default'])) {
                continue;
            }

            if (get_post_meta($page->ID, $name, true) !== '') {
                $result['skipped']++;
                continue;
            }

            $source = tp_editable_theme_image_source((string) $settings['default']);
            if (!$source) {
                $result['errors'][] = $slug . ': no se encontró la imagen de ' . $name;
                continue;
            }

            $existing_ids = get_posts([
                'post_type'      => 'attachment',
                'post_status'    => 'inherit',
                'posts_per_page' => 1,
                'fields'         => 'ids',
                'meta_key'       => '_tp_theme_image_source',
                'meta_value'     => $source['relative'],
                'no_found_rows'  => true,
            ]);
            $attachment_id = tp_editable_import_theme_image($source, (string) $settings['label']);

            if (is_wp_error($attachment_id)) {
                $result['errors'][] = $slug . ': ' . $attachment_id->get_error_message();
                continue;
            }

            if (!$existing_ids) {
                $result['imported']++;
            }

            $field_key = 'field_tp_' . md5($slug . ':' . $name);
            update_field($field_key, $attachment_id, $page->ID);

            if ((int) get_post_meta($page->ID, $name, true) !== $attachment_id) {
                $result['errors'][] = $slug . ': no se pudo asignar la imagen a ' . $name;
                continue;
            }

            $result['assigned']++;
        }
    }

    return $result;
}

/**
 * Obtiene el slug de la página que se está mostrando o editando.
 */
function tp_editable_page_slug(?int $post_id = null): string
{
    $post_id = $post_id ?: (int) get_queried_object_id();
    if (!$post_id && isset($_GET['post'])) {
        $post_id = absint($_GET['post']);
    }

    return $post_id ? (string) get_post_field('post_name', $post_id) : '';
}

/**
 * Devuelve un texto editable y usa el contenido aprobado como respaldo.
 *
 * @return mixed
 */
function tp_content(string $field_name, ?string $slug = null, ?int $post_id = null)
{
    $slug = $slug ?: tp_editable_page_slug($post_id);
    if (!$post_id && $slug) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        $post_id = $page ? (int) $page->ID : null;
    }
    $schema = tp_editable_content_schema();
    $default = $schema[$slug]['fields'][$field_name]['default'] ?? '';

    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id ?: false);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }

        if ($slug === 'rentas') {
            $aliases = ['tem', 'cisi', 'cementerio'];
            foreach ($aliases as $alias) {
                $alias_page = get_page_by_path($alias, OBJECT, 'page');
                if ($alias_page && $alias_page->ID !== $post_id) {
                    $alias_val = get_field($field_name, $alias_page->ID);
                    if ($alias_val !== null && $alias_val !== false && $alias_val !== '') {
                        return $alias_val;
                    }
                }
            }
        }
    }

    return $default;
}

add_action('save_post_page', static function ($post_id): void {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $slug = get_post_field('post_name', $post_id);
    $template = get_page_template_slug($post_id);
    if (in_array($slug, ['rentas', 'tem', 'cisi', 'cementerio'], true) || $template === 'page-tramites-rentas.php') {
        $targets = ['rentas', 'tem', 'cisi', 'cementerio'];
        $schema = tp_editable_content_schema()['rentas']['fields'] ?? [];
        foreach ($targets as $target_slug) {
            $target_page = get_page_by_path($target_slug, OBJECT, 'page');
            if (!$target_page || (int)$target_page->ID === (int)$post_id) continue;
            foreach (array_keys($schema) as $field_name) {
                $val = get_post_meta($post_id, $field_name, true);
                $key = get_post_meta($post_id, '_' . $field_name, true);
                if ($val !== '') {
                    update_post_meta($target_page->ID, $field_name, $val);
                }
                if ($key !== '') {
                    update_post_meta($target_page->ID, '_' . $field_name, $key);
                }
            }
        }
    }
}, 20);

/**
 * Devuelve una lista editable, con un elemento por línea.
 *
 * @return string[]
 */
function tp_content_lines(string $field_name, ?string $slug = null, ?int $post_id = null): array
{
    $value = (string) tp_content($field_name, $slug, $post_id);
    $lines = preg_split('/\r\n|\r|\n/', $value) ?: [];

    return array_values(array_filter(array_map('trim', $lines), static fn($line) => $line !== ''));
}

/**
 * Devuelve filas editables separadas por el carácter |.
 *
 * @return array<int, string[]>
 */
function tp_content_rows(string $field_name, ?string $slug = null, ?int $post_id = null): array
{
    return array_map(
        static fn(string $line): array => array_map('trim', explode('|', $line)),
        tp_content_lines($field_name, $slug, $post_id)
    );
}

/**
 * Devuelve la URL de una imagen seleccionada en la biblioteca de medios.
 */
function tp_content_image_url(string $field_name, ?string $slug = null, ?int $post_id = null): string
{
    $value = tp_content($field_name, $slug, $post_id);
    if (is_array($value) && !empty($value['url'])) {
        return (string) $value['url'];
    }
    if (is_numeric($value)) {
        return (string) (wp_get_attachment_image_url((int) $value, 'large') ?: '');
    }

    return is_string($value) ? $value : '';
}

/**
 * Devuelve las URLs de una galería editable (ACF gallery).
 * Si el campo está vacío, devuelve [] para que el template use el fallback del tema.
 *
 * @return string[]
 */
// Si el campo gallery está vacío en admin, mostrar el fallback como valor por defecto para que se vean las fotos actuales para editar
add_filter('acf/load_value', function($value, $post_id, $field) {
    $field_name = $field['name'] ?? '';
    if (preg_match('/^gallery(?:_[a-z0-9_]+)?_([1-8])$/', $field_name, $matches) !== 1) {
        return $value;
    }
    if (get_post_type($post_id) !== 'page') return $value;
    
    // Si ya existe la relación de campo ACF en postmeta, significa que ya fue inicializado/guardado
    if (metadata_exists('post', $post_id, '_' . $field_name)) {
        return $value;
    }
    
    $slug = get_post_field('post_name', $post_id);
    // Punto Digital ahora tiene galerías editables por sala; no saltar
    // if ($slug === 'punto-digital') return $value; // removido
    
    $index = (int)$matches[1] - 1;
    $map = tp_gallery_fallback_map();
    if (empty($map[$slug]) || !isset($map[$slug][$index])) return $value;
    
    $rel = $map[$slug][$index];
    $abs = trailingslashit(get_template_directory()) . $rel;
    if (!is_file($abs)) return $value;
    
    $source = ['path'=>$abs, 'relative'=>$rel];
    $att_id = tp_editable_import_theme_image($source, 'Galería - '.$slug.' (Foto '.($index+1).')');
    if (!is_wp_error($att_id)) {
        update_post_meta($post_id, $field_name, $att_id);
        update_post_meta($post_id, '_' . $field_name, $field['key'] ?? 'field_tp_'.md5($slug.':'.$field_name));
        return $att_id;
    }
    return $value;
}, 10, 3);

function tp_content_gallery_urls(string $field_name = 'gallery', ?string $slug = null, ?int $post_id = null): array
{
    $slug = $slug ?: tp_editable_page_slug($post_id);
    if (!$post_id && $slug) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        $post_id = $page ? (int) $page->ID : null;
    }

    $urls = [];
    $has_any_saved = false;
    $prefix = $field_name;
    
    for ($i = 1; $i <= 8; $i++) {
        $key = $prefix . '_' . $i;
        if ($post_id && metadata_exists('post', $post_id, '_' . $key)) {
            $has_any_saved = true;
        }
        
        $value = tp_content($key, $slug, $post_id);
        if ($value) {
            if (is_numeric($value)) {
                $url = wp_get_attachment_image_url((int) $value, 'large');
                if ($url) {
                    $urls[] = $url;
                }
            } elseif (is_string($value) && $value !== '') {
                $urls[] = $value;
            }
        }
    }

    if ($has_any_saved) {
        return array_values(array_filter($urls));
    }

    return [];
}

/**
 * Usa la pantalla clásica en las páginas administradas con estos campos.
 * Evita mostrar un editor de bloques vacío que podría confundir al personal.
 */
add_filter('use_block_editor_for_post', static function (bool $use_block_editor, $post): bool {
    if (!$post instanceof WP_Post || $post->post_type !== 'page') {
        return $use_block_editor;
    }

    if (in_array($post->post_name, ['rentas', 'tem', 'cisi', 'cementerio'], true) || get_page_template_slug($post->ID) === 'page-tramites-rentas.php') {
        return false;
    }

    return array_key_exists($post->post_name, tp_editable_content_schema()) ? false : $use_block_editor;
}, 10, 2);

/**
 * Registra los campos en las páginas existentes de WordPress.
 */
add_action('acf/init', static function (): void {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    foreach (tp_editable_content_schema() as $slug => $page_schema) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page) {
            // Si la página aún no existe (instalaciones previas), la creamos al vuelo para que la sección Galería aparezca sin esperar al siguiente init
            $titles = [
                'obras-publicas' => 'Obras Públicas',
                'oficina-empleo' => 'Oficina de Empleo',
                'cultura' => 'Cultura',
                'deporte' => 'Deporte',
                'educacion' => 'Educación',
                'seguridad' => 'Seguridad',
                'alumbrado' => 'Alumbrado Público',
                'politicas-sociales' => 'Políticas Sociales',
                'punto-digital' => 'Punto Digital',
                'tribunal-de-faltas' => 'Tribunal de Faltas',
                'catastro' => 'Catastro',
                'transito' => 'Tránsito',
                'rentas' => 'Rentas',
            ];
            $title = $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug));
            $new_id = wp_insert_post([
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ], true);
            if (is_wp_error($new_id) || !$new_id) {
                continue;
            }
            // Asignar plantilla si existe en el mapa de áreas
            $tmpl_map = [
                'obras-publicas' => 'page-obras-publicas.php',
                'cultura' => 'page-cultura.php',
                'deporte' => 'page-deporte.php',
                'educacion' => 'page-educacion.php',
                'seguridad' => 'page-seguridad.php',
                'alumbrado' => 'page-alumbrado.php',
                'politicas-sociales' => 'page-politicas-sociales.php',
                'oficina-empleo' => 'page-oficina-empleo.php',
            ];
            if (isset($tmpl_map[$slug])) {
                update_post_meta($new_id, '_wp_page_template', $tmpl_map[$slug]);
            }
            $page = get_post($new_id);
            if (!$page) continue;
        }

        $fields = [[
            'key'     => 'field_tp_notice_' . md5($slug),
            'label'   => 'Contenido editable',
            'name'    => '',
            'type'    => 'message',
            'message' => 'Estos campos modifican textos e imágenes seleccionadas. El diseño, los enlaces y el funcionamiento de la página permanecen protegidos. Si una imagen queda vacía, se conserva la actual.',
        ]];

        foreach ($page_schema['fields'] as $name => $settings) {
            $type = $settings['type'] ?? 'text';

            if ($type === 'gallery') {
                $prefix = $name;
                $base_label = $settings['label'] ?? 'Foto de galería';
                // Si el label ya contiene "Galería –", usamos un sufijo corto para cada foto
                $is_grouped = strpos($prefix, 'gallery_') === 0 || $prefix === 'gallery';
                for ($i = 1; $i <= 8; $i++) {
                    $fields[] = [
                        'key'           => 'field_tp_' . md5($slug . ':' . $prefix . '_' . $i),
                        'label'         => $base_label . ' — foto ' . $i,
                        'name'          => $prefix . '_' . $i,
                        'type'          => 'image',
                        'instructions'  => $i === 1 ? ($settings['instructions'] ?? 'Podés cargar hasta 8 fotos. Si las dejás vacías, se usarán las del tema.') : '',
                        'required'      => 0,
                        'default_value' => '',
                        'return_format' => 'id',
                        'preview_size'  => 'medium',
                        'library'       => 'all',
                    ];
                }
                continue;
            }

            $field = [
                'key'           => 'field_tp_' . md5($slug . ':' . $name),
                'label'         => $settings['label'],
                'name'          => $name,
                'type'          => $type,
                'instructions'  => $settings['instructions'] ?? '',
                'required'      => 0,
                'default_value' => $type === 'image' ? '' : ($settings['default'] ?? ''),
            ];

            if ($type === 'textarea') {
                $field['rows'] = substr_count((string) $field['default_value'], "\n") > 2 ? 8 : 4;
                $field['new_lines'] = '';
            }
            if ($type === 'image') {
                $field['return_format'] = 'id';
                $field['preview_size'] = 'medium';
                $field['library'] = 'all';
            }
            if ($type === 'file') {
                $field['return_format'] = 'url';
            }

            $fields[] = $field;
        }

        $location_groups = [[
            [
                'param'    => 'page',
                'operator' => '==',
                'value'    => (string) $page->ID,
            ]
        ]];

        if ($slug === 'rentas') {
            $alias_slugs = ['tem', 'cisi', 'cementerio'];
            foreach ($alias_slugs as $alias_slug) {
                $alias_page = get_page_by_path($alias_slug, OBJECT, 'page');
                if ($alias_page) {
                    $location_groups[] = [[
                        'param'    => 'page',
                        'operator' => '==',
                        'value'    => (string) $alias_page->ID,
                    ]];
                }
            }
            $location_groups[] = [[
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-tramites-rentas.php',
            ]];
        }

        acf_add_local_field_group([
            'key'                   => 'group_tp_' . md5($slug),
            'title'                 => 'Contenido de ' . $page_schema['label'],
            'fields'                => $fields,
            'location'              => $location_groups,
            'position'              => 'acf_after_title',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => ['the_content', 'discussion', 'comments'],
            'active'                => true,
        ]);
    }
});

/**
 * Ejecuta la precarga una sola vez por instalación. En una publicación nueva,
 * la versión guardada en la base de datos no existe y la migración se repite.
 */
add_action('admin_init', static function (): void {
    // Handler para forzar precarga manual: siempre disponible via ?tp_fix_galleries=1 aunque migración ya esté hecha
    if (isset($_GET['tp_fix_galleries']) && current_user_can('edit_pages') && current_user_can('upload_files')) {
        $forced = tp_editable_preload_galleries(true);
        update_option('tp_editable_image_migration_report', ['galleries_forced' => $forced], false);
        add_action('admin_notices', function() use ($forced) {
            $msg = 'Galerías precargadas: ' . (int)$forced['assigned'] . ' páginas asignadas, ' . count($forced['errors']) . ' errores.';
            if (!empty($forced['errors'])) $msg .= ' Detalle: ' . esc_html(implode(' | ', array_slice($forced['errors'],0,3)));
            else $msg .= ' Revisá Páginas > [Área] > Galería de imágenes.';
            echo '<div class="notice notice-success is-dismissible"><p><strong>Galerías:</strong> '.esc_html($msg).' — son 8 páginas (no 8 fotos), cada una con 1 a 8 fotos (total ~30). Recargá <em>Páginas &gt; [Área] &gt; Galería de imágenes</em> para verlas.</p></div>';
        });
        // No retornar, seguir con migración normal si hace falta
    }

    $migration_version = '2026-08-09-1';

    if (
        get_option('tp_editable_image_migration') === $migration_version
        || !current_user_can('upload_files')
        || !current_user_can('edit_pages')
        || !function_exists('update_field')
    ) {
        return;
    }

    $result = tp_editable_preload_images();
    $gallery_result = tp_editable_preload_galleries();
    // Combinar reportes para diagnóstico
    $result['galleries'] = $gallery_result;
    update_option('tp_editable_image_migration_report', $result, false);

    if (empty($result['errors']) && empty($gallery_result['errors'])) {
        update_option('tp_editable_image_migration', $migration_version, false);
    }
}, 20);

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden mb-12'); ?>>
    <?php if(has_post_thumbnail()): ?>
        <div class="relative h-72 md:h-[500px] w-full group overflow-hidden">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105']); ?>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent"></div>
            
            <div class="absolute bottom-8 left-8 right-8 md:bottom-12 md:left-12 md:right-12 flex flex-col items-start z-10">
                <div class="flex gap-2 mb-4">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                            echo '<span class="px-4 py-1.5 bg-blue-600 text-white text-xs md:text-sm font-bold uppercase tracking-wider rounded-full shadow-lg">' . esc_html( $category->name ) . '</span>';
                        }
                    }
                    ?>
                </div>
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-md"><?php the_title(); ?></h1>
                
                <div class="flex flex-wrap items-center gap-6 text-sm md:text-base text-gray-200 font-medium">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Por <?php the_author(); ?>
                    </span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="p-8 md:p-12 lg:p-16 bg-white">
        <?php if(!has_post_thumbnail()): ?>
            <header class="mb-12 border-b border-gray-100 pb-8">
                <div class="flex gap-2 mb-6">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                            echo '<span class="px-4 py-1.5 bg-blue-100 text-blue-700 text-xs md:text-sm font-bold uppercase tracking-wider rounded-full">' . esc_html( $category->name ) . '</span>';
                        }
                    }
                    ?>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6 leading-tight"><?php the_title(); ?></h1>
                <div class="flex flex-wrap items-center gap-6 text-sm md:text-base text-gray-500 font-medium">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Por <?php the_author(); ?>
                    </span>
                </div>
            </header>
        <?php endif; ?>

        <div class="prose prose-lg lg:prose-xl prose-blue max-w-none text-gray-700 prose-headings:text-gray-900 prose-headings:font-bold prose-p:leading-relaxed prose-a:text-blue-600 hover:prose-a:text-blue-800 prose-img:rounded-2xl prose-img:shadow-md">
            <?php the_content(); ?>
        </div>
    </div>
</article>

<?php if (have_rows('hero')) : ?>
    <?php while (have_rows('hero')) : the_row(); ?>
        <?php $background_image = get_sub_field('hero_background'); ?>
        <section id="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1 event">
                        <?php if (have_rows('hero_edition')) : ?>
                            <?php while (have_rows('hero_edition')) : the_row(); ?>
                                <?php $currentYear = date('Y'); ?>
                                <?php $yearOfItem = get_sub_field('hero_year'); ?>
                                <div class="<?php the_sub_field('hero_year'); ?> <?php if ($currentYear == $yearOfItem) { ?>active<?php } else { ?>hidden<?php } ?>">
                                    <?php the_sub_field('hero_content'); ?>
                                    <?php if (have_rows('hero_date')) : ?>
                                        <div class="dates d-flex flex-wrap">
                                            <?php while (have_rows('hero_date')) : the_row(); ?>
                                                <div class="date-block d-flex align-items-center">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0C3.73478 0 3.48043 0.105357 3.29289 0.292893C3.10536 0.48043 3 0.734784 3 1V2H2C1.46957 2 0.960859 2.21071 0.585786 2.58579C0.210714 2.96086 0 3.46957 0 4V14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16H14C14.5304 16 15.0391 15.7893 15.4142 15.4142C15.7893 15.0391 16 14.5304 16 14V4C16 3.46957 15.7893 2.96086 15.4142 2.58579C15.0391 2.21071 14.5304 2 14 2H13V1C13 0.734784 12.8946 0.48043 12.7071 0.292893C12.5196 0.105357 12.2652 0 12 0C11.7348 0 11.4804 0.105357 11.2929 0.292893C11.1054 0.48043 11 0.734784 11 1V2H5V1C5 0.734784 4.89464 0.48043 4.70711 0.292893C4.51957 0.105357 4.26522 0 4 0ZM4 5C3.73478 5 3.48043 5.10536 3.29289 5.29289C3.10536 5.48043 3 5.73478 3 6C3 6.26522 3.10536 6.51957 3.29289 6.70711C3.48043 6.89464 3.73478 7 4 7H12C12.2652 7 12.5196 6.89464 12.7071 6.70711C12.8946 6.51957 13 6.26522 13 6C13 5.73478 12.8946 5.48043 12.7071 5.29289C12.5196 5.10536 12.2652 5 12 5H4Z" fill="#E9184E" />
                                                    </svg>
                                                    <div class="event-location"><?php the_sub_field('location'); ?></div>
                                                    <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line y1="1.25" x2="14" y2="1.25" stroke="#E9184E" stroke-width="1.5" />
                                                    </svg>
                                                    <div class="event-date"><?php the_sub_field('date'); ?></div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php $call_to_action = get_sub_field('call_to_action'); ?>
                                    <?php if ($call_to_action) { ?>
                                        <a class="button" href="<?php echo $call_to_action['url']; ?>" target="<?php echo $call_to_action['target']; ?>">
                                            <span class="button-year">E<?php the_sub_field('hero_year'); ?></span>
                                            <span class="button-content"><?php echo $call_to_action['title']; ?></span>
                                        </a>
                                    <?php } ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="d-none d-lg-block col-lg-5 offset-lg-6 arrow">
                        <svg height="551" viewBox="0 0 550 551" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M549.001 1H549.501V0.5H549.001V1ZM481.601 527.299V527.799V527.299ZM414.202 459.594H413.702H414.202ZM414.202 136.409H414.702V135.909H414.202V136.409ZM92.4714 136.409V136.909V136.409ZM25.0718 68.7045H24.5718H25.0718ZM92.4714 1.00001V1.50001V1.00001ZM481.601 527.799C519.103 527.799 549.501 497.261 549.501 459.594H548.501C548.501 496.713 518.547 526.799 481.601 526.799V527.799ZM413.702 459.594C413.702 497.261 444.099 527.799 481.601 527.799V526.799C444.656 526.799 414.702 496.713 414.702 459.594H413.702ZM413.702 136.409V459.594H414.702V136.409H413.702ZM92.4714 136.909L414.202 136.909V135.909L92.4714 135.909V136.909ZM24.5718 68.7045C24.5718 106.371 54.9693 136.909 92.4714 136.909V135.909C55.5259 135.909 25.5718 105.823 25.5718 68.7045H24.5718ZM92.4714 0.50001C54.9693 0.500006 24.5718 31.0383 24.5718 68.7045H25.5718C25.5718 31.5863 55.5259 1.50001 92.4714 1.50001V0.50001ZM549.501 459.594V1H548.501V459.594H549.501ZM549.001 0.5L92.4714 0.50001V1.50001L549.001 1.5V0.5Z" fill="#E9184E" />
                            <path d="M29.1611 395.445L29.519 395.794L29.1611 395.445ZM231.939 187.594V187.094H231.729L231.581 187.245L231.939 187.594ZM26.5455 525.513L26.8958 525.156L26.5455 525.513ZM156.114 520.09L156.472 520.439L156.114 520.09ZM361.255 309.818L361.613 310.167L361.755 310.021V309.818H361.255ZM361.255 187.594H361.755V187.094H361.255V187.594ZM29.519 395.794L232.297 187.943L231.581 187.245L28.8033 395.096L29.519 395.794ZM26.8958 525.156C-7.94429 490.949 -6.81082 433.032 29.519 395.794L28.8033 395.096C-7.87021 432.686 -9.0789 491.237 26.1952 525.87L26.8958 525.156ZM155.756 519.741C119.427 556.979 61.7347 559.362 26.8958 525.156L26.1952 525.87C61.4703 560.504 119.798 558.031 156.472 520.439L155.756 519.741ZM360.897 309.468L155.756 519.741L156.472 520.439L361.613 310.167L360.897 309.468ZM360.755 187.594V309.818H361.755V187.594H360.755ZM231.939 188.094L361.255 188.094V187.094L231.939 187.094V188.094Z" fill="#E9184E" />
                        </svg>
                    </div>
                </div>
            </div>
            <?php $background_image = get_sub_field('hero_background'); ?>
            <?php if ($background_image) { ?>
                <img class="hero-img" src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>" />
            <?php } ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
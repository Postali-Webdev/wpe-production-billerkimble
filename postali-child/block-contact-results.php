<section class="contact-results">
    <div class="container">
        <div class="columns">
            <div class="column-50 contact">
                <h2>WE ARE YOUR LAWYERS FOR COMPLEX, <span>HIGH-STAKES CASES.</span></h2>           
                <a data-lity data-lity-target="#paid-modal" class="contact_comp lity-paid-modal-btn" href="/" title="Learn more about our compensation">See how we're paid ></a>
                <div class="contact_info">
                    <a class="btn" href="/contact/" title="Contact Us">Contact Form</a>
                    <a class="phone-link" href="tel:<?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?>" title="Call Today"><?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?></a>
                </div>
            </div>
            <div class="column-50 results">
                <span class="results_title">Since launching our firm in 2019, we have negotiated or won over</span>
                <?php $won_raw = get_field('total_won', 'options');
                $total_won = number_format($won_raw); ?>
                <span class="results_number">$<?php echo $total_won; ?></span>
                <span class="results_desc">for our clients from a combination of settlements & judgements</span>
                <span class="results_updated">Last updated <?php the_field('last_updated', 'options'); ?></span>
                <a class="results_btn btn" href="/case-results/" title="See More Results">See More Results</a>
                <span class="results_sub">Results like ours are unheard of in the legal industry. This is why people trust us to handle their complex legal matters.</span>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'popup-modal'); ?>
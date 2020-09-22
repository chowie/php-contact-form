<section class="resume-section" id="contact">
    <div id="app" class="">
        <contact-form v-if="!submitted"></contact-form>
        <success v-if="submitted"></success>
    </div>
</section>

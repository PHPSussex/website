<x-layout.grid-section tag="footer" class="border-t border-gray-800">
    <x-slot:pre class="border-t border-gray-800"></x-slot:pre>
    <div class="grid lg:grid-cols-2 gap-6 mb-6">
        <x-footer.item heading="Accessibility" icon="access">
            <x-type.para variant="small">
                We are committed to making this site accessible,
                but please be aware it is maintained by volunteers.
            </x-type.para>
            <x-type.para variant="small">
                If you're having difficulty accessing or using this site, please
                <a href="#organisers" class="link link-focus">let the organisers know</a>
                so we can look into improving it for everyone.
            </x-type.para>
        </x-footer.item>
        <x-footer.item heading="Privacy" icon="privacy">
            <x-type.para variant="small">
                To improve this site we use privacy-first analytics services
                which don't creepily track you around the&nbsp;web.
            </x-type.para>
            <x-type.para variant="small">
                <x-type variant="upper">However,</x-type> the speaker form is currently
                powered by Google Forms. If you visit the form be aware this comes under
                Google's privacy&nbsp;policy.
            </x-type.para>
        </x-footer.item>
    </div>
    <div class="flex flex-col gap-2">
        <small>
            This site is powered by
            <span class="inline-flex gap-1"><a href="https://laravel.com/" class="link link-focus !decoration-1">Laravel</a>
                <x-icon.laravel class="w-5 h-5 text-primary-400" />
            </span>
            and GitHub pages &ndash;
            <span class="italic">but how? Come along and ask&nbsp;us!</span>
        </small>
    </div>
</x-layout.grid-section>

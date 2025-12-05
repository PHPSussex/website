@use(function App\setting)
@use(function App\theme)
<x-layout.html>
    <header @class(['border-b divide-y', theme('border', 'divide')])>
        <div class="md:hidden">
            <x-layout.grid-section>
                <x-logo.php-sussex class="w-18" />
            </x-layout.grid-section>
        </div>
        <x-layout.grid-section :no-padding="true" :collapse="true">
            <x-slot:pre class="flex flex-col">
                <div class="grow flex justify-center items-center">
                    <x-logo.php-sussex class="hidden md:block w-20 2xl:w-24" />
                </div>
            </x-slot:pre>
            <x-home.hero />
        </x-layout.grid-section>
    </header>

    <main id="content" @class(['divide-y', theme('divide')])>

        <h1 class="sr-only">PHP Sussex</h1>

        <x-layout.grid-section heading="About us">
            <x-type tag="p" variant="display headline" class="mb-3">PHP Sussex is a free, open to all meetup, based in Brighton UK.</x-type>
            <div class="space-y-3">
                <x-type.para variant="dim">We're a community of folks who <x-type.emoji text="love" icon="heart" /> working with the web and
                    getting <x-type.emoji text="sh*t" icon="poo" /> done fast using PHP based applications.
                </x-type.para>

                <x-type.para variant="dim">We meet every couple of months to socialise and share ideas
                over drinks, pizza and presentations by some awesome speakers from the PHP commmunity.</x-type.para>
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Next Event">
            <x-type.para>That's all for 2025 &ndash; wishing everyone a splendid festive period!</x-type.para>
            <x-meetup-link />
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Socials">
            <x-socials class="mt-6 -mx-6 md:-mx-8 -mb-6 md:-mb-8" />
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Organisers">
            <x-type.para class="mb-6">Need to know where the toilets are or which pizza is veggie, vegan&nbsp;/&nbsp;<span class="text-nowrap">gluten-free</span>?</x-type.para>
            <div @class([
                '-mx-6 md:-mx-8 -mb-6 md:-mb-8 grid grid-cols-1 sm:grid-cols-2',
                'sm:divide-x divide-y sm:divide-y-0 border-t',
                theme('border', 'divide')
            ])>
                <x-home.organizer
                    class="py-6 md:py-8"
                    name="Yannick"
                    :img="setting('portrait-yannick')"
                    pronounced="Yan-eek"
                    linkedin="https://linkedin.com/in/yannickchenot"
                />
                <x-home.organizer
                    class="py-6 md:py-8"
                    name="Joby"
                    :img="setting('portrait-joby')"
                    pronounced="Joe-bee"
                    linkedin="https://linkedin.com/in/jobyharding"
                />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Speak">
            <x-type.para variant="dim">Want to speak at PHP Sussex? Amazing!  We'd love to hear from you.
            Complete the form below and we'll get back to you.</x-type.para>
            <div
                role="note"
                @class([
                    'flex items-start gap-2 bg-primary-500/20 p-2 mt-4',
                    'border-l-4 border-primary-500 rounded-sm'
                ])
            >
                <x-type variant="primary">
                    <x-icon.info class="w-5 h-5 flex-shrink-0 text-primary-500" />
                </x-type>
                <x-type class="text-sm">The speaker form link will take you to Google&nbsp;Forms</x-type>
            </div>
            <a
                data-event="speaker form click"
                href="https://forms.gle/tHe66kBsgFbnM5ZW7"
                class="mt-4 text-2xl inline-block link link-focus"
            >Speaker form</a>
        </x-layout.grid-section>

        <x-layout.grid-divider />

        <x-layout.grid-section heading="Sponsors &amp; Support">
            <x-type.para variant="dim" class="mb-8">We couldn't do it on our own. Massive thanks to our amazing friends:</x-type.para>
            <div class="flex flex-row flex-wrap gap-10 justify-between">
                <x-sponsor
                    name="Silicon Brighton"
                    provides="Support & AV"
                    url="https://siliconbrighton.com"
                />
                <x-sponsor
                    name="Runway East"
                    provides="Venue"
                    url="https://runwayea.st"
                />
                <x-sponsor name="Tillo" provides="Pizza & Drinks" url="https://tillo.com" />
            </div>
        </x-layout.grid-section>

        <x-layout.grid-divider />
    </main>

    <x-layout.footer />
</x-layout.html>

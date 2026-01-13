import.meta.glob([
    '../images/**',
    '../fonts/**',
    '../views/pages/slides/images/**',
])
import './bootstrap'

document.addEventListener('DOMContentLoaded', () => {
    if (!window.fathom) return

    document.querySelectorAll('[data-event]').forEach(link => {
        link.addEventListener('click', event => {
            if (!link.dataset.event) {
                return
            }

            fathom.trackEvent(link.dataset.event)
        })
    })
})

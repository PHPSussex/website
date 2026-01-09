import Reveal from 'reveal.js'
import Notes from '../../node_modules/reveal.js/plugin/notes/notes.esm.js'
import Markdown from '../../node_modules/reveal.js/plugin/markdown/markdown.esm.js'
import Highlight from '../../node_modules/reveal.js/plugin/highlight/highlight.esm.js'

let deck = new Reveal({
    plugins: [Markdown, Highlight, Notes],
    showNotes: false,
})

window.Reveal = deck

deck.on('slidechanged', function () {
    localStorage.setItem('slides', JSON.stringify(deck.getState()))
})

deck.on('ready', function () {
    try {
        const state = localStorage.getItem('slides')
        deck.setState(JSON.parse(state))
    } catch {
        //
    }
})

deck.initialize()

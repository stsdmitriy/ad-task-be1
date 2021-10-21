function onReady() {
    console.log('onReady module_1')
    console.log('onReady module_2')
}

function onViewable() {
    console.log('onViewable module_1')
    console.log('onViewable module_2')
}

onReady()
setTimeout(function() {
    onViewable()
}, 500)


//Create Proxy to intercept and modify operations of the object
const InitializeProxy = (state) => {
    return new Proxy(state, {
        set(target, property, value) {
            target[property] = value;
            render();
            return true;
        }
    });
};

var data = InitializeProxy({
    name: 'Rojan Shrestha',
    title: 'Tech Lead'
});


//Add Keyup Listeners to all the elements with data-model attribute
const listeners = document.querySelectorAll('[data-model]');

listeners.forEach((listener) => {
    const name = listener.dataset.model;
    listener.addEventListener('keyup', (event) => {
        data[name] = listener.value;
    });
});


//Update the value and innerHtml of data-model and data-binding as per values;
const render = () => {
    const bindings = Array.from(document.querySelectorAll('[data-binding]')).map(
        e => e.dataset.binding
    );
    bindings.forEach((binding) => {
        document.querySelector(`[data-binding='${binding}']`).innerHTML = data[binding];
        document.querySelector(`[data-model='${binding}']`).value = data[binding];
    });
};

//Change Values to test out the 2 way binding from model side
const changeValues = () => {
   data.name = "Test";
   data.title = "test2";
}

render();



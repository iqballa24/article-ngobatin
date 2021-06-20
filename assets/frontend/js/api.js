import getSelectItem from './select.js';
import showItems from './component/items.js';

let SELECTED_URL = getSelectItem();

const fetchAPI = url => {
    return fetch(url, {mode: 'no-cors'})
    .then(res => {
        if (res.status !== 200) {
            console.log("Error: " + res.status);
            return Promise.reject(new Error(res.statusText))
        } else {
            return Promise.resolve(res)
        }
    })
    .then(res => res.json())
    .catch(error => {
        console.log(error);
    });
};

function getAllItems() {
    document.getElementById('spinner').style.display = 'block';
    fetchAPI(SELECTED_URL)
        .then(data => {
            showItems(data);
        })
        .catch(error => {
            console.log(error);
        });
}

document.getElementById('selector').addEventListener("change", ()=>{
    const itemsElement = document.getElementById('selectedItem');
    SELECTED_URL = getSelectItem();
    itemsElement.innerHTML = '';
    getAllItems();
});

export default getAllItems;

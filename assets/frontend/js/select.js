const getSelectItem = () => {
    const selector = document.getElementById('selector').value;
    let BASE_URL = `../../data/${selector}.json`;
    return BASE_URL;
}

export default getSelectItem;
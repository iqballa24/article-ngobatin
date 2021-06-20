function showTeams(data) {

    let teamsHTML = '';
    const teamsElement = document.getElementById('team');

    data.forEach(teams => {
        teamsHTML += `

        <div class="col-12 box-container">
            <div class="box-img">
                <div class="img">
                    <img src="./assets/img/team1.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Misbah Ramadani</h3>
                </div>
            </div>
            <div class="box-img">
                <div class="img">
                    <img src="./assets/img/team2.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Hendra P. Aditama</h3>
                </div>
            </div>
            <div class="box-img">
                <div class="img">
                    <img src="./assets/img/team5.jpg" alt="">
                </div>
                <div class="text">
                    <h3>M Ramzy Alfinrizq</h3>
                </div>
            </div>
            <div class="box-img">
                <div class="img">
                    <img src="./assets/img/team6.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Tengku Iqbal Nugraha</h3>
                </div>
            </div>
        </div>
        `

        teamsElement.innerHTML = teamsHTML;
    });
}

export default showTeams;
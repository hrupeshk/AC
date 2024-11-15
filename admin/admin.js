document.addEventListener("DOMContentLoaded", function() {
    // Fetch the JSON data
    fetch('admin.json')
        .then(response => response.json())
        .then(data => {
            // Access the memberContainer div
            const memberContainer = document.querySelector('.memberContainer');

            // Loop through the JSON data and create a div for each faculty member
            var i = 1;
            for (; i<=5; i++) {
                const memberData = data[i.toString()];
                var memberDiv = document.createElement('div');
                memberDiv.classList.add('member');
                memberContainer.appendChild(memberDiv);

                // Populate the member div with data
                memberDiv.innerHTML = `
                    <img src="${memberData.img}" alt="${memberData.name}" class="profile-photo">
                    <h3>${memberData.name}</h3>
                    <p>${memberData.designation}</p>
                    <p>${memberData.designation2}</p>
                    <p>Email: ${memberData.email}</p>
                `;

                // Append the member div to the memberContainer
                memberContainer.appendChild(memberDiv);
            }

            // Loop through the JSON data and create a div for each student member

            for (; i<=9; i++) {
                const memberData = data[i.toString()];
                var memberDiv = document.createElement('div');
                memberDiv.classList.add('member');
                memberContainer.appendChild(memberDiv);

                // Populate the member div with data
                memberDiv.innerHTML = `
                    <img src="${memberData.img}" alt="${memberData.name}" class="profile-photo">
                    <h3>${memberData.name}</h3>
                    <p>${memberData.designation}</p>
                    <p>${memberData.programme}</p>
                    <p>Roll No: ${memberData.roll_no}</p>
                    <p>Email: ${memberData.email}</p>
                `;

                // Append the member div to the memberContainer
                memberContainer.appendChild(memberDiv);
            }

            // Developer
            const developerContainer = document.querySelector('.developerContainer');
            var j = 10;
            for (; j<=11; j++){
                const developerData = data[j.toString()];
                var developerDiv = document.createElement('div');
                developerDiv.classList.add('developer');
                developerContainer.appendChild(developerDiv);

                    // Populate the developer div with data
                    developerDiv.innerHTML = `
                    <img src="${developerData.img}" alt="${developerData.name}" class="profile-photo">
                    <h3>${developerData.name}</h3>
                    <p>${developerData.designation}</p>
                    <p>${developerData.programme}</p>
                    <p>Roll No: ${developerData.roll_no}</p>
                    <p>Email: ${developerData.email}</p>
                `;

                developerContainer.appendChild(developerDiv);
            }
            
        })
        .catch(error => console.error('Error fetching admin data:', error));
});

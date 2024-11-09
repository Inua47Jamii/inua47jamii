// Define pre-made comments
const premadeComments = [
    {
        name: "John Mwendwa.",
        phone: "07******12",
        county: "Nairobi",
        text: "Excited to apply! This program sounds amazing for the youth.",
        time: "2024-11-13T12:00:00Z"
    },
    {
        name: "Wangari Mumbi.",
        phone: "07******44",
        county: "Mombasa",
        text: "Hope to get a chance, this will be a great help for me and my family.",
        time: "2024-11-8T09:30:00Z"
    },
    {
        name: "Melda Kenji.",
        phone: "07******46",
        county: "Kiambu",
        text: "They respond quickly, kindly others to hurry up.",
        time: "2024-11-7T09:30:00Z"
    },
    {
        name: "Colince Kiphorir",
        phone: "07******35",
        county: "Kericho",
        text: "I wish i could get this earlier.",
        time: "2024-11-7T09:30:00Z"
    },{
        name: "Boro Isaac.",
        phone: "07******11",
        county: "Garissa",
        text: "This one found me in Nairobi. I'm now working in Naivas Supa. Tell a friend to tell a friend.",
        time: "2024-11-7T09:30:00Z"
    },
    {
        name: "Benjamin Kipngeno .",
        phone: "07******06",
        county: "Kericho",
        text: "Initially i thought ni scum. Kumbe ni Ukweli",
        time: "2024-11-7T09:30:00Z"
    },
    {
        name: "Felista Nyabuto.",
        phone: "07******46",
        county: "Kisii",
        text: "Hii ndo form wakuu, aki am now working and i was paid after job",
        time: "2024-10-27T09:30:00Z"
    },{
        name: "Lolei Vincent",
        phone: "07******16",
        county: "Narok",
        text: "Im very thankful to Inua Jamii. Let the work of president to continue",
        time: "2024-11-7T09:20:00Z"
    },{
        name: "Murithi Kimanthi",
        phone: "07******41",
        county: "Nakuru",
        text: "im very grateful",
        time: "2024-11-8T01:30:00Z"
    },{
        name: "Mwita Ndugu",
        phone: "07******35",
        county: "Migori",
        text: "Tuliajiriwa watu wawili and we are working in shift daily",
        time: "2024-11-7T09:30:00Z"
    },{
        name: "Melda Kenji.",
        phone: "07******49",
        county: "Kakamega",
        text: "Waa! Nice job. Natumia relatives and friends wote",
        time: "2024-11-7T06:30:00Z"
    },{
        name: "Maurine Litumia",
        phone: "07******36",
        county: "Busia",
        text: "Aki tumefikiwa sisi undergraduates",
        time: "2024-11-7T09:30:00Z"
    },{
        name: "Winny Jepngeno",
        phone: "07******67",
        county: "Uasin Gishu",
        text: "Aki my sister sent me this link and ive reported to work. Yesterday i was paid my ksh 800 ",
        time: "2024-11-7T09:30:00Z"
    },{
        name: "Fredrick Nyanya",
        phone: "07******26",
        county: "Nyamira",
        text: "Aki for long. Nimeajiriwa migori Zamzam supermarket lets do it as early",
        time: "2024-11-7T19:30:00Z"
    },{
        name: "Levine Musyoka",
        phone: "07******46",
        county: "Meru",
        text: "I was employed in Nyandarua. Can i change to Meru",
        time: "2024-11-7T09:30:00Z"
    },{
        name: "Melda Kenji.",
        phone: "07******46",
        county: "Nyeri",
        text: "I wish I could get the job ASAP. ndo nmeapply",
        time: "2024-11-7T04:30:00Z"
    },{
        name: "Sheldon Meldon",
        phone: "07******61",
        county: "Kajiado",
        text: "Wawawawa! No interview and I am working",
        time: "2024-11-7T11:30:00Z"
    },{
        name: "Marion Kwamboka",
        phone: "07******46",
        county: "Makueni",
        text: "Kujeni watu",
        time: "2024-12-7T09:30:00Z"
    },{
        name: "Rashid Abdala",
        phone: "07******06",
        county: "kwale",
        text: "Yani its fo everyone. Aki encourage everyone to apply.",
        time: "2024-11-7T09:30:00Z"
    },
    // Add more pre-made comments as needed
];

// Function to format time ago
function timeAgo(date) {
    const now = new Date();
    const seconds = Math.floor((now - date) / 1000);
    const intervals = [
        { label: "year", seconds: 31536000 },
        { label: "month", seconds: 2592000 },
        { label: "week", seconds: 604800 },
        { label: "day", seconds: 86400 },
        { label: "hour", seconds: 3600 },
        { label: "minute", seconds: 60 }
    ];
    for (const interval of intervals) {
        const count = Math.floor(seconds / interval.seconds);
        if (count >= 1) {
            return `${count} ${interval.label}${count > 1 ? "s" : ""} ago`;
        }
    }
    return "just now";
}

// Function to add a user-submitted comment
function addUserComment(event) {
    event.preventDefault();
    const name = document.getElementById("commentName").value;
    const text = document.getElementById("commentText").value;
    const userComment = document.createElement("div");
    userComment.className = "comment";
    userComment.innerHTML = `<p><strong>${name}</strong></p><p>${text}</p><p class="time-ago">just now</p>`;
    document.getElementById("userCommentsContainer").prepend(userComment);
    document.getElementById("commentForm").reset();
}

// Function to display a random pre-made comment every two minutes
function displayRandomPremadeComment() {
    const premadeContainer = document.getElementById("premadeCommentsContainer");
    premadeContainer.innerHTML = ""; // Clear previous comments

    const randomComment = premadeComments[Math.floor(Math.random() * premadeComments.length)];
    const commentTime = new Date(randomComment.time);

    const premadeComment = document.createElement("div");
    premadeComment.className = "comment";
    premadeComment.innerHTML = `
        <p><strong>${randomComment.name}</strong> - ${randomComment.phone}</p>
        <p><strong>County:</strong> ${randomComment.county}</p>
        <p>${randomComment.text}</p>
        <p class="time-ago">${timeAgo(commentTime)}</p>
    `;
    premadeContainer.appendChild(premadeComment);
}

// Initialize the first display of a pre-made comment
displayRandomPremadeComment();

// Update the pre-made comment every 2 minutes
setInterval(displayRandomPremadeComment, 6000);

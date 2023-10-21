function setCookie(name, value, daysToExpire) {
    const date = new Date();
    date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name + "=") === 0) {
            return cookie.substring(name.length + 1, cookie.length);
        }
    }
    return "";
}

document.addEventListener("DOMContentLoaded", function() {
    if(getCookie("bearer_token")){
        document.querySelectorAll('.bearer-token-input').forEach(input => {
            input.value = getCookie("bearer_token");
        });
    }
});

function doRegisterRequest() {
    var data = new FormData();
    data.append("name", document.getElementById("register-name").value);
    data.append("email", document.getElementById("register-email").value);
    data.append("password", document.getElementById("register-password").value);

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function() {
        console.log(JSON.parse(this.response));
        if (this.readyState === 4) {
            document.getElementById("register-response").innerHTML = this.responseText;
            document.getElementById("register-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';

            if(JSON.parse(this.response) && JSON.parse(this.response)['token']){
                setCookie("bearer_token", JSON.parse(this.response)['token'], 7);
                document.querySelectorAll('.bearer-token-input').forEach(input => {
                    input.value = JSON.parse(this.response)['token'];
                });
            }
        }
    });

    xhr.open("POST", "/api/login");
    xhr.setRequestHeader("Accept", "application/json");
    xhr.send(data);
}

function doLoginRequest() {
    var data = new FormData();
    data.append("email", document.getElementById("login-email").value);
    data.append("password", document.getElementById("login-password").value);

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function() {
        console.log(JSON.parse(this.response));
        if (this.readyState === 4) {
            document.getElementById("login-response").innerHTML = this.responseText;
            document.getElementById("login-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';

            if(JSON.parse(this.response) && JSON.parse(this.response)['token']){
                setCookie("bearer_token", JSON.parse(this.response)['token'], 7);
                document.querySelectorAll('.bearer-token-input').forEach(input => {
                    input.value = JSON.parse(this.response)['token'];
                });
            }
        }
    });

    xhr.open("POST", "/api/login");
    xhr.setRequestHeader("Accept", "application/json");
    xhr.send(data);
}

function doPostsRequest() {
    var xhr = new XMLHttpRequest();
    var page = document.getElementById("posts-page").value;
    var sort_column = document.getElementById("posts-sort-column").value;
    var sort_direction = document.getElementById("posts-sort-direction").value;
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === 4) {
            document.getElementById("posts-response").innerHTML = this.responseText;
            document.getElementById("posts-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';
        }
    });

    xhr.open("GET", "/api/posts?page="+page+"&sort_column="+sort_column+"&sort_direction="+sort_direction);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.send();
}

function doPostRequest() {
    var xhr = new XMLHttpRequest();
    var post_id = document.getElementById("post-id").value;
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === 4) {
            document.getElementById("post-response").innerHTML = this.responseText;
            document.getElementById("post-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';
        }
    });

    xhr.open("GET", "/api/post/"+post_id);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.send();
}

// Get references to the input and img elements
const fileInput = document.getElementById('post-create-featured_image');
const imagePreview = document.getElementById('featured_image_preview');

// Add an event listener to the file input
fileInput.addEventListener('change', function () {
    // Check if a file has been selected
    if (fileInput.files.length > 0) {
        // Get the selected file
        const selectedFile = fileInput.files[0];

        // Check if the selected file is an image (you may want to enhance this check)
        if (selectedFile.type.startsWith('image/')) {
            // Create a URL for the selected image
            const imageURL = URL.createObjectURL(selectedFile);

            // Update the src attribute of the image element
            imagePreview.src = imageURL;
        } else {
            // Handle the case where a non-image file is selected
            alert('Please select an image file.');
            fileInput.value = '/assets/images/placeholder-image.jpg'; // Clear the input to allow reselection
        }
    } else {
        // Clear the image preview if no file is selected
        imagePreview.src = '/assets/images/placeholder-image.jpg';
    }
});

function doPostCreateRequest() {
    var data = new FormData();
    data.append("title", document.getElementById("post-create-title").value);
    data.append("content", document.getElementById("post-create-content").value);

     // Get the input file element for featured_image
     var featuredImageInput = document.getElementById("post-create-featured_image");
     // Check if a file has been selected
     if (featuredImageInput.files.length > 0) {
         data.append("featured_image", featuredImageInput.files[0]);
     }

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function() {
        console.log(this);
        if (this.readyState === 4) {
            document.getElementById("post-create-response").innerHTML = this.responseText;
            document.getElementById("post-create-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';
        }
    });

    xhr.open("POST", "/api/post/create");
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader("Authorization", "Bearer "+document.getElementById("post-create-token").value);
    xhr.send(data);
}

function doPostUpdateRequest() {
    var post_id = document.getElementById("post-update-id").value;
    var data = new FormData();
    data.append("title", document.getElementById("post-update-title").value);
    data.append("content", document.getElementById("post-update-content").value);

     // Get the input file element for featured_image
     var featuredImageInput = document.getElementById("post-update-featured_image");
     // Check if a file has been selected
     if (featuredImageInput.files.length > 0) {
         data.append("featured_image", featuredImageInput.files[0]);
     }

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function() {
        console.log(this);
        if (this.readyState === 4) {
            document.getElementById("post-update-response").innerHTML = this.responseText;
            document.getElementById("post-update-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';
        }
    });

    xhr.open("POST", "/api/post/update/"+post_id);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader("Authorization", "Bearer "+document.getElementById("post-update-token").value);
    xhr.send(data);
}

function doPostDeleteRequest() {
    var post_id = document.getElementById("post-delete-id").value;
    var data = new FormData();
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function() {
        console.log(this);
        if (this.readyState === 4) {
            document.getElementById("post-delete-response").innerHTML = this.responseText;
            document.getElementById("post-delete-response-status").innerHTML = '<span class="response-status-code">' + this.status + '</span> <span class="response-status-text">'+this.statusText+'</span>';
        }
    });

    xhr.open("POST", "/api/post/delete/"+post_id);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader("Authorization", "Bearer "+document.getElementById("post-delete-token").value);
    xhr.send(data);
}

var accordion = document.getElementsByClassName("accordion");

for (var i = 0; i < accordion.length; i++) {
  accordion[i].addEventListener("click", function() {
    // Remove the "active" class from all other panels
    for (var j = 0; j < accordion.length; j++) {
        if (accordion[j] !== this) {
            accordion[j].classList.remove("active");
            var otherPanel = accordion[j].nextElementSibling;
            otherPanel.style.maxHeight = null;
        }
    }
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
  });
}

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
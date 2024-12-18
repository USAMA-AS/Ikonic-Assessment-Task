# Ikonic-Assessment-Task
Assessment Task - Wordpress Backend Developer (PHP)

**1- Please setup a Blank WordPress project**  
**2- Do initial commit of blank project on a GitHub repository (Just push wp-content/plugins and wp-content/themes Folders)**  
Commited a theme.  

**3- Write a function that will redirect the user away from the site if their IP address starts with 77.29. Use WordPress native hooks and APIs to handle this.**  

**4- Register post type called "Projects" and a taxonomy "Project Type" for this post type.**  

**5- Create a WordPress archive page that displays six Projects per page with pagination. Simple pagination is enough (with next, prev buttons).**  

**6- Create an Ajax endpoint that will output the last three published "Projects" that belong in the "Project Type" called "Architecture" If the user is not logged in. If the user is logged In it should return the last six published "Projects" in the project type call. "Architecture". Results should be returned in the following JSON format {success: true, data: [{object}, {object}, {object}, {object}, {object}]}. The object should contain three properties (id, title, link).**  
Ajax endpoint: `http://xyz.com/wp-admin/admin-ajax.php?action=ia_architecture_projects`  

**7- Use the WordPress HTTP API to create a function called hs_give_me_coffee() that will return a direct link to a cup of coffee for us using the Random Coffee API [JSON].**  
Used this API: `https://coffee.alexflipnote.dev/random.json`.

**8- Use this API https://api.kanye.rest/ and show 5 quotes on a page.**  
Added a shortcode to display quotes: `[kanye_quotes]`.

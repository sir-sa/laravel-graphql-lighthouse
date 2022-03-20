


<h3>Laravel Graphql using Lighthouse Package</h3>

<ol>
    <li>Clone the Project</li>
    <li>After Cloning, run <code>composer install or composer update</code></li>
    <li>create .env . match it into your database credentials</li>
    <li>Run<code>cp .env.example .env</code></li>
    <li>Run<code>php artisan key:generate</code></li>
    <li>Run<code>php artisan migrate</code></li>
    <li>Run <code>php artisan serve</code></li>
</ol>


<h4> Run the project and  write the following commands in the http://127.0.0.1:8000/graphql-playground</h4>

# Write your query or mutation here
mutation register{
  register(
    input: { name: "sammy", email: "sam@test.com", password: "password" }
  ) {
    id
    name
  }
}

mutation login{
  login(input: { email: "test@test.com", password: "password" }) {
    id
    email
    name
  }
}
mutation logout {
  logout {
    id
    email
  }
}

query user {
  me {
    id
    email
  }
  
  vehicles {
  id
  reg_no
  type
  tonnage
  manufacture_year
}
}


mutation registerVehicle{
  registerVehicle(input: {
    reg_no: "KCS 125"
    type:"truck"
    manufacture_year: "2020"
    tonnage:"5.0"
  }){
    reg_no
    manufacture_year
  }
}


mutation updateVehicle{
  updateVehicle(id:1, input: {
    type: "Semi-Truck"
    tonnage: "6.0"
  }){
    id
    reg_no
    tonnage
  }
}

mutation deleteVehicle{
  deleteVehicle(id:1) {
    id
    reg_no
    type
    manufacture_type
    tonnage
  }
}

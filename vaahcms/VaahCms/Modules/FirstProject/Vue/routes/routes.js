let routes= [];

import dashboard from "./vue-routes-dashboard";
import blog from "./vue-routes-blogs";
import product from "./vue-routes-products";
import category from "./vue-routes-categories";


routes = routes.concat(dashboard);
routes = routes.concat(blog);
routes = routes.concat(product);
routes = routes.concat(category);
export default routes;

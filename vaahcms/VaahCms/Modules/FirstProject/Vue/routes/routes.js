let routes= [];

import dashboard from "./vue-routes-dashboard";
import blog from "./vue-routes-blogs";

routes = routes.concat(dashboard);
routes = routes.concat(blog);
export default routes;

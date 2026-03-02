import "../css/main.css";
import Alpine from "alpinejs";
import { dashboard } from "./dashboard.js";

Alpine.data("dashboard", dashboard);
Alpine.start();

import * as React from "react";
import { Navbar } from "flowbite-react";
import { CostumeIconColor } from "@/components";

export default function NavbarBrand({ children }: React.ReactElement) {
	return (
		<Navbar.Brand href="#">
			<CostumeIconColor>{children}</CostumeIconColor>
			<span className="ml-2 self-center whitespace-nowrap text-2xl font-semibold dark:text-white">
				Lintas Portal
			</span>
		</Navbar.Brand>
	);
}

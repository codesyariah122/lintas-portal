"use client";

import * as React from "react";
import { BiSolidDashboard } from "react-icons/bi";
import { SiYourtraveldottv } from "react-icons/si";
import { Dropdown, Navbar, Avatar } from "flowbite-react";
import { NavbarBrand, NavbarDropdown } from "@/components";

export default function RootNavbar() {
	return (
		<Navbar
			fluid
			rounded
			style={{
				position: "sticky",
				top: 0,
				zIndex: 10,
				background: "white",
				boxShadow: "0 2px 4px rgba(0, 0, 0, 0.7)",
			}}
		>
			<NavbarBrand children={<SiYourtraveldottv size={24} />} />

			<div className="flex mx-auto">
				<Navbar.Collapse>
					<Navbar.Link href="#" active>
						Home
					</Navbar.Link>
					<Navbar.Link href="#">About</Navbar.Link>
					<Navbar.Link href="#">Services</Navbar.Link>
					<Navbar.Link href="#">Pricing</Navbar.Link>
					<Navbar.Link href="#">Contact</Navbar.Link>
				</Navbar.Collapse>
			</div>

			<div className="flex md:order-2 ml-auto">
				<NavbarDropdown
					children={
						<Avatar
							alt="User settings"
							img="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
							rounded
						/>
					}
				/>
				<Navbar.Toggle />
			</div>
		</Navbar>
	);
}

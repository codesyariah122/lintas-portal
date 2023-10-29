import * as React from "react";
import { Dropdown } from "flowbite-react";

interface NavbarDropdownProps {
	children: React.ReactNode;
}

export default function NavbarDropdown({ children }: NavbarDropdownProps) {
	return (
		<Dropdown arrowIcon={false} inline label={children}>
			<Dropdown.Header>
				<span className="block text-sm">Bonnie Green</span>
				<span className="block truncate text-sm font-medium">
					name@flowbite.com
				</span>
			</Dropdown.Header>
			<Dropdown.Item>Dashboard</Dropdown.Item>
			<Dropdown.Item>Settings</Dropdown.Item>
			<Dropdown.Item>Earnings</Dropdown.Item>
			<Dropdown.Divider />
			<Dropdown.Item>Sign out</Dropdown.Item>
		</Dropdown>
	);
}

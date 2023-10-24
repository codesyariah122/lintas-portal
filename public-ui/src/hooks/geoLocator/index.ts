import { useQuery } from "@tanstack/react-query";
import { CORE_URL } from "@/constants/env";

const apiKey = "3cdb95819e0bddb327ef14508105f444";

const fetchGetLocator = async () => {
	const response = await fetch(`${CORE_URL}/geo-locator`, {
		method: "GET",
		headers: {
			"X-Api-Key": apiKey,
		},
	});

	if (!response.ok) {
		throw new Error("Failed to fetch data");
	}

	const result = await response.json();
	return result;
};

const useGeoLocator = () => {
	return useQuery({
		queryKey: ["getLocator"],
		queryFn: async () => await fetchGetLocator(),
	});
};

export { useGeoLocator };

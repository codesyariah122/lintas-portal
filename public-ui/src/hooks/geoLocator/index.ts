import { useQuery } from "@tanstack/react-query";
import { CORE_URL, API_KEY } from "@/constants/env";

const fetchGetLocator = async () => {
	const response = await fetch(`${CORE_URL}/public/geo-locator`, {
		method: "GET",
		headers: {
			"X-Api-Key": API_KEY,
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

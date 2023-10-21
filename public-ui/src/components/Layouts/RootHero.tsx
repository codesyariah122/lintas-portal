import * as React from "react";

export default function RootHero() {
	return (
		<div className="flex justify-center items-center">
			<div className="w-[95vw] bg-gradient-to-b from-indigo-500 to-indigo-700 text-white py-16">
				<div className="container mx-auto text-center">
					<h1 className="text-4xl font-bold">Lintas Portal</h1>
					<p className="mt-4 text-lg">
						Cara baru berbagi ragam informasi dan berita.
					</p>
					<button className="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 mt-6 rounded-full">
						Mulai Kontribusi
					</button>
				</div>
			</div>
		</div>
	);
}

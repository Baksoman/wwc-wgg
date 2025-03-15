<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardSeeder extends Seeder
{
    public function run($count = 10): void
    {
        $cards =[
            ['title' => 'Beyond the Horizon', 'description' => 'The horizon marks the edge of what we know, but beyond it lies an infinite realm of possibilities. It invites us to explore, to dream, and to seek out new adventures that redefine our limits.', 'colorTitle' => '#FFD700', 'colorDesc' => '#F5F5DC', 'colorBg' => '#5A189A'],
            ['title' => 'Into the Unknown', 'description' => 'Stepping into the unknown is both thrilling and terrifying. It is where we break free from our comfort zones, challenge our fears, and embrace the mystery of what lies ahead, shaping our destiny in unexpected ways.', 'colorTitle' => '#FF4500', 'colorDesc' => '#FFFFFF', 'colorBg' => '#003366'],
            ['title' => 'Beyond Imagination', 'description' => 'Our imagination has no limits, yet what lies beyond even that? A world where the impossible becomes real, where creativity takes flight, and where the boundaries of thought dissolve into endless innovation and wonder.', 'colorTitle' => '#32CD32', 'colorDesc' => '#FFFFF0', 'colorBg' => '#7B2CBF'],
            ['title' => 'Past the Limits', 'description' => 'Limits exist only in the mind. Beyond them, we find growth, achievement, and a deeper understanding of what we are truly capable of when we dare to push beyond conventional boundaries.', 'colorTitle' => '#DC143C', 'colorDesc' => '#E0FFFF', 'colorBg' => '#2E2E2E'],
            ['title' => 'Uncharted Realms', 'description' => 'There are worlds waiting to be discovered—both in the vastness of space and within ourselves. Venturing into these uncharted realms leads to new perspectives, knowledge, and an appreciation for the endless mysteries of existence.', 'colorTitle' => '#FF8C00', 'colorDesc' => '#FAEBD7', 'colorBg' => '#001F3F'],
            ['title' => 'Beyond the Stars', 'description' => 'The stars are not the limit—they are only the beginning. Beyond them lie galaxies yet to be explored, secrets of the universe waiting to be uncovered, and a future that holds infinite potential for those who dare to look up.', 'colorTitle' => '#1E90FF', 'colorDesc' => '#FFFAFA', 'colorBg' => '#4A148C'],
            ['title' => 'Endless Possibilities', 'description' => 'The future is not set in stone. Every choice, every step we take creates new opportunities. Beyond what we can see is a world of endless possibilities, shaped by our ambition and willingness to embrace change.', 'colorTitle' => '#00FA9A', 'colorDesc' => '#F8F8FF', 'colorBg' => '#5E60CE'],
            ['title' => 'Transcending Boundaries', 'description' => 'To transcend is to evolve beyond limitations. Whether physical, mental, or societal, pushing past boundaries leads to innovation, growth, and an expansion of what we believe is possible in our ever-changing world.', 'colorTitle' => '#8B0000', 'colorDesc' => '#FFFFE0', 'colorBg' => '#556B2F'],
            ['title' => 'Beyond Reality', 'description' => 'What if reality is just a perception? Beyond what we know, there exists alternate dimensions, new ways of thinking, and a world where fiction meets truth, blurring the lines between what is real and what is possible.', 'colorTitle' => '#ADFF2F', 'colorDesc' => '#EEE8AA', 'colorBg' => '#7C2AD5'],
            ['title' => 'The Great Beyond', 'description' => 'A realm of infinite depth, stretching across time and space. The great beyond holds mysteries beyond human comprehension, waiting for explorers, dreamers, and visionaries to uncover the wonders hidden within its vast expanse.', 'colorTitle' => '#FF1493', 'colorDesc' => '#E6E6FA', 'colorBg' => '#8A4AC3'],
            ['title' => 'Breaking the Barriers', 'description' => 'Barriers are meant to be broken. Whether they exist in the mind, in technology, or in society, those who dare to break through them are the ones who redefine the world and shape the future.', 'colorTitle' => '#40E0D0', 'colorDesc' => '#F0FFF0', 'colorBg' => '#7B1FA2'],
            ['title' => 'Beyond the Veil', 'description' => 'Some truths remain hidden, veiled behind the ordinary. To see beyond is to uncover secrets, to peer into the unseen, and to embrace the mysteries that lie just beneath the surface of our reality.', 'colorTitle' => '#FF6347', 'colorDesc' => '#FFF5EE', 'colorBg' => '#1C1C1C']
        ];

        if ($count < 1 || $count > 10) {
            $count = 10;
        }

        shuffle($cards);
        $selectedCards = array_slice($cards, 0, $count);

        DB::table('cards')->insert($selectedCards);
    }
};
